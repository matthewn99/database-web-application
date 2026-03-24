
import java.sql.*;

class Database {
    // Database credentials are not included in this repository. Please configure your own connection details in <placeholder>
    private static final String DB_CONNECTION_URL = "jdbc:oracle:thin:@<host>:<port>:<db>";
    private static final String USER = "<username>";
    private static final String PASS = "<password>";

    private static final String Database = "oracle.jdbc.driver.OracleDriver";
    private static Statement stmt;
    private static Connection con;

    //CREATE CONNECTION
    public Database() {
        try {
            //Loads the class into the memory
            Class.forName("oracle.jdbc.driver.OracleDriver");

            // establish connection to database
            con = DriverManager.getConnection(DB_CONNECTION_URL, USER, PASS);
            stmt = con.createStatement();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    void insertQuery(String query){
        try{
            stmt.executeUpdate(query);
        }catch (Exception e){
            System.out.println(e);
        }
    }
    //Check number of datasets for table Rennfahrerin
    void countDatasetsRennfahrerin() {
        try {
            ResultSet rs = stmt.executeQuery("SELECT count(*) from rennfahrerin");
            if (rs.next()) {
                int count = rs.getInt(1);
                System.out.println("Number of datasets: " + count);
            }
        } catch (Exception e) {
            System.err.println("Error while printing datasets of Rennfahrerin");
        }
    }

    void countDatasetsWagen() {
        try {
            ResultSet rs = stmt.executeQuery("SELECT count(*) from wagen");
            if (rs.next()) {
                int count = rs.getInt(1);
                System.out.println("Number of datasets: " + count);
            }
        } catch (Exception e) {
            System.err.println("Error while printing datasets of wagen");
        }
    }

    void countDatasetsRunden() {
        try {
            ResultSet rs = stmt.executeQuery("SELECT count(*) from fahren");
            if (rs.next()) {
                int count = rs.getInt(1);
                System.out.println("Number of datasets: " + count);
            }
        } catch (Exception e) {
            System.err.println("Error while printing datasets of wagen");
        }
    }

    int countRennfahrerin() {
        try {
            ResultSet rs = stmt.executeQuery("SELECT count(*) from rennfahrerin");
            if (rs.next()) {
                int count = rs.getInt(1);
                return count;
            }
        } catch (Exception e) {
            System.err.println("Error while returning amount of datasets of Rennfahrerin");
        }
        return 0;
    }

    int countWagen() {
        try {
            ResultSet rs = stmt.executeQuery("SELECT count(*) from wagen");
            if (rs.next()) {
                int count = rs.getInt(1);
                return count;
            }
        } catch (Exception e) {
            System.err.println("Error while returning amount of datasets of Rennfahrerin");
        }
        return 0;
    }

    public void close()  {
        try {
            stmt.close(); //clean up
            con.close();
        } catch (Exception ignored) {
        }
    }
}
