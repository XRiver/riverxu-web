package cn.riverxu.helper;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.Date;

public class Logger {

	private static File logs;
	private static FileWriter fw;
	static {
		logs = new File("C:/log.txt");
		try {
			fw = new FileWriter(logs);
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
	public static void log(String content) {
		try {
			fw.write(new Date()+":"+content);
			fw.flush();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
}
