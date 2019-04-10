import java.sql.*;

public class ProgramEleven {
    public static void main(String[] args){
        String name = "root";
        String password = "root";
        String url = "jdbc:mysql://localhost:3306/mcafourth";

        try{
            Class.forName("com.mysql.cj.jdbc.Driver");
            Connection conn = DriverManager.getConnection(url, name, password);
            new Application(conn);
        }catch(Exception e){
            System.out.println(e);
        }
    }
}