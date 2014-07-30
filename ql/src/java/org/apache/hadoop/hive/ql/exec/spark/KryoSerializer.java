/**
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

package org.apache.hadoop.hive.ql.exec.spark;

import java.io.ByteArrayInputStream;
import java.io.ByteArrayOutputStream;
import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;

import org.apache.hadoop.hive.ql.exec.Utilities;
import org.apache.hadoop.hive.ql.exec.mr.ExecMapper;
import org.apache.hadoop.mapred.JobConf;

import com.esotericsoftware.kryo.Kryo;
import com.esotericsoftware.kryo.io.Input;
import com.esotericsoftware.kryo.io.Output;

public class KryoSerializer {
  private static final Kryo kryo = Utilities.runtimeSerializationKryo.get();

  static {
    kryo.register(ExecMapper.class);
  }

  public static byte[] serialize(Object object) {
    ByteArrayOutputStream stream = new ByteArrayOutputStream();
    Output output = new Output(stream);

    kryo.writeObject(output, object);

    output.close(); // close() also calls flush()
    return stream.toByteArray();
  }

  public static <T> T deserialize(byte[] buffer,Class<T> clazz)  {
    return kryo.readObject(new Input(new ByteArrayInputStream(buffer)), clazz);
  }

  public static byte[] serializeJobConf(JobConf jobConf) {
    ByteArrayOutputStream out = new ByteArrayOutputStream();
    try {
      jobConf.write(new DataOutputStream(out));
    } catch (IOException e) {
      // TODO Auto-generated catch block
      e.printStackTrace();
      return null;
    } finally {
      try {
        out.close();
      } catch (IOException e) {
        // TODO Auto-generated catch block
        e.printStackTrace();
      }
    }

    return out.toByteArray();

  }

  public static JobConf deserializeJobConf(byte[] buffer) {
    JobConf conf = new JobConf();
    try {
      conf.readFields(new DataInputStream(new ByteArrayInputStream(buffer)));
    } catch (IOException e) {
      // TODO Auto-generated catch block
      e.printStackTrace();
      return null;
    }
    return conf;
  }

}
