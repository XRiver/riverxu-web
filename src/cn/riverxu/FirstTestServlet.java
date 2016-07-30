package cn.riverxu;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.eclipse.jdt.internal.compiler.batch.Main;

import cn.riverxu.helper.Logger;

/**
 * Servlet implementation class FirstTestServlet
 */

public class FirstTestServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public FirstTestServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		
		request.setCharacterEncoding("utf-8");
		String name = request.getParameter("name");
		String action = request.getParameter("action");
		NameExpertOfDiscrimination expert = new NameExpertOfDiscrimination();
		String result = expert.getAnswer(name);
		
		if (action.equals("submit")) {
			request.setAttribute("answer", result);
			RequestDispatcher dispatcher = getServletContext().getRequestDispatcher("/example/name_response.jsp");
			dispatcher.forward(request, response);
		} else {
			response.setContentType("text/plain");
			File f = File.createTempFile("result"+System.currentTimeMillis(), ".txt");
			FileWriter fw = new FileWriter(f);
			fw.write(result);
			fw.close();
			
			Logger.log("File created "+f.getAbsolutePath());
			
			InputStream is = new FileInputStream(f);
			if (is == null) {
				is = getServletContext().getResourceAsStream("/resource/error.txt");
			}
			int read = 0;
			byte[] buf = new byte[1024];
			OutputStream os = response.getOutputStream();
			while ((read=is.read(buf))!=-1) {
				os.write(buf, 0, read);
			}
			is.close();
			os.close();
		}
		
		
	}

}
