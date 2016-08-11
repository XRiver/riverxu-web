package cn.riverxu;

import java.util.Date;

import javax.servlet.*;

/**
 * Application Lifecycle Listener implementation class InitDateRecorder
 *
 */
public class InitDateRecorder implements ServletContextListener {

    /**
     * Default constructor. 
     */
    public InitDateRecorder() {
        // TODO Auto-generated constructor stub
    }

	/**
     * @see ServletContextListener#contextDestroyed(ServletContextEvent)
     */
    public void contextDestroyed(ServletContextEvent arg0)  { 
         // TODO Auto-generated method stub
    }

	/**
     * @see ServletContextListener#contextInitialized(ServletContextEvent)
     */
    public void contextInitialized(ServletContextEvent arg0)  { 
         ServletContext context = arg0.getServletContext();
         Date current = new Date();
         context.setAttribute("init-date", current);
    }
	
}
