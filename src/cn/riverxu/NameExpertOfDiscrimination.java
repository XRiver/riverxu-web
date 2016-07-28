package cn.riverxu;

public class NameExpertOfDiscrimination {

	public String getAnswer (String name) {
		if (name.length() == 0) {
			return "No name identified.";
		}
		
		switch (name.charAt(0)) {
		case '徐': return "你是徐家人";
		default: return "你不是咱家人";
		}
		
	}
	
}
