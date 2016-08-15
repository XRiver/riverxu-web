package cn.riverxu;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.OutputStreamWriter;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

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
		
		Cookie[] cookies = request.getCookies();
		boolean cookieFilled = false;
		for (Cookie c : cookies) {
			if (c.getName().equals("is_admin")) {
				cookieFilled = true;
			}
		}
		if (!cookieFilled) {
			Cookie c = null;
			if (name.equals("徐江河")) {
				c = new Cookie("is_admin","true");
				c.setPath("/");
				response.addCookie(c);
			} else {
				c = new Cookie("is_admin","false");
				c.setPath("/");
				response.addCookie(c);
			}		
		}
		
		if (action.equals("submit")) {
			request.setAttribute("answer", result);
			RequestDispatcher dispatcher = getServletContext().getRequestDispatcher("/example/name_response.jsp");
			dispatcher.forward(request, response);
		} else {
			response.setContentType("application/octet-stream");
			response.setCharacterEncoding("utf-8");
			response.addHeader("Content-Disposition", "attachment; filename=result.txt");

			File f = File.createTempFile("result"+System.currentTimeMillis(), ".txt");
			OutputStreamWriter out = new OutputStreamWriter(new FileOutputStream(f),"UTF-8");
			out.write(result);
			out.close();
			
			InputStream is = new FileInputStream(f);
			
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
