import java.io.*;
import java.net.*;
class GossipServer
{
	public static void main(String[] args) throws Exception
	{
		ServerSocket sersock = new ServerSocket(4444);
		System.out.println("Server  ready for chatting");
		Socket sock = sersock.accept( );                          
		// reading from keyboard (keyRead object)
		BufferedReader keyRead = new BufferedReader(new InputStreamReader(System.in));
		// sending to client (pwrite object)
		OutputStream ostream = sock.getOutputStream(); 
		PrintWriter pwrite = new PrintWriter(ostream, true);
		String a,b;

		// receiving from server ( receiveRead  object)
		InputStream istream = sock.getInputStream();
		BufferedReader receiveRead = new BufferedReader(new InputStreamReader(istream));

		String receiveMessage, sendMessage;               
		while(true)
		{  
		    pwrite.println("gsg");
			a=receiveRead.readLine();
			b=receiveRead.readLine();
			
			System.out.println(a+""+b);             
			pwrite.flush();
		}               
    }                    
}                        

