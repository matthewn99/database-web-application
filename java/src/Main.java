import java.util.ArrayList;
import java.util.Random;
import java.util.List;

public class Main {
    public static void main(String args[]) {
        Database dbHelper = new Database();

        Random random = new Random();

        //Generator fuer rennfahrerin
        try {
            String[] Vornamen = new String[]{"Matthew", "Lucas", "Adriana", "Sofiya", "Marcel", "Linus", "Baran", "Ed", "Will", "Tim", "Thomas", "Christian", "Kristina"};
            ArrayList<String> Vorname = new ArrayList<String>(List.of(Vornamen));

            String[] Nachnamen = new String[]{"Nachbaur", "Hatz", "Renna", "Garkot", "Artner-Rauch", "Volger", "Zorlu", "Cavani", "Smithson", "Burger"};
            ArrayList<String> Nachname = new ArrayList<String>(List.of(Nachnamen));

            String[] Laender = new String[]{"Österreich", "Deutschland", "Japan", "Frankreich"};
            ArrayList<String> Land = new ArrayList<String>(List.of(Laender));

            int i = 0;
            while(i < 100) {
                System.out.println(i);
                i++;
                //int team = random.nextInt((teamAmount-1)+1)+1;

                int year = random.nextInt(2003 - 1988) + 1988;
                int month = random.nextInt((12 - 1) + 1) + 1;
                int day;
                if (month == 1 || month == 3 || month == 5 || month == 7 || month == 8 || month == 10 || month == 12) {
                    day = random.nextInt((31 - 1) + 1) + 1;
                }
                if (month == 2) {
                    if (year % 4 == 0)
                        day = random.nextInt((29 - 1) + 1) + 1;
                    else
                        day = random.nextInt((28 - 1) + 1) + 1;
                }
                else
                    day = random.nextInt((30 - 1) + 1) + 1;

                //insert into rennfahrerin(teamid, vorname, nachname, nationalitaet, gebdatum)
                //    select t.teamId, 'Will', 'Watson', 'Frankreich', to_date('2003/04/23', 'yyyy/mm/dd') from team t
                //        where t.teamId = (select teamid from
                //            (select teamid from team
                //            order by dbms_random.value) where rownum = 1);

                if (month >= 10) {
                    if (day >= 10) {
                        System.out.println("INSERT INTO rennfahrerin (teamId, vorname, nachname, nationalitaet, gebDatum)" +
                                "select t.teamId, '" + Vorname.get(random.nextInt(Vorname.size())) + "', '" + Nachname.get(random.nextInt(Nachname.size())) + "', '" + Land.get(random.nextInt(Land.size())) + "', " +
                                "to_date('" + year + "/" + month + "/" + day + "', 'yyyy/mm/dd') from team t where t.teamId =(select teamId from (select teamid from team order by dbms_random.value) where rownum = 1)");
                        dbHelper.insertQuery("INSERT INTO rennfahrerin (teamId, vorname, nachname, nationalitaet, gebDatum)" +
                                "select t.teamId, '" + Vorname.get(random.nextInt(Vorname.size())) + "', '" + Nachname.get(random.nextInt(Nachname.size())) + "', '" + Land.get(random.nextInt(Land.size())) + "', " +
                                "to_date('" + year + "/" + month + "/" + day + "', 'yyyy/mm/dd') from team t where t.teamId =(select teamId from (select teamid from team order by dbms_random.value) where rownum = 1)");
                    }
                    else {
                        System.out.println("INSERT INTO rennfahrerin (teamId, vorname, nachname, nationalitaet, gebDatum)" +
                                "select t.teamId, '" + Vorname.get(random.nextInt(Vorname.size())) + "', '" + Nachname.get(random.nextInt(Nachname.size())) + "', '" + Land.get(random.nextInt(Land.size())) + "', " +
                                "to_date('" + year + "/" + month + "/0" + day + "', 'yyyy/mm/dd') from team t where t.teamId =(select teamId from (select teamid from team order by dbms_random.value) where rownum = 1)");
                        dbHelper.insertQuery("INSERT INTO rennfahrerin (teamId, vorname, nachname, nationalitaet, gebDatum)" +
                                "select t.teamId, '" + Vorname.get(random.nextInt(Vorname.size())) + "', '" + Nachname.get(random.nextInt(Nachname.size())) + "', '" + Land.get(random.nextInt(Land.size())) + "', " +
                                "to_date('" + year + "/" + month + "/0" + day + "', 'yyyy/mm/dd') from team t where t.teamId =(select teamId from (select teamid from team order by dbms_random.value) where rownum = 1)");
                    }
                }
                else {
                    if (day >= 10) {
                        System.out.println("INSERT INTO rennfahrerin (teamId, vorname, nachname, nationalitaet, gebDatum)" +
                                "select t.teamId, '" + Vorname.get(random.nextInt(Vorname.size())) + "', '" + Nachname.get(random.nextInt(Nachname.size())) + "', '" + Land.get(random.nextInt(Land.size())) + "', " +
                                "to_date('" + year + "/0" + month + "/" + day + "', 'yyyy/mm/dd') from team t where t.teamId =(select teamId from (select teamid from team order by dbms_random.value) where rownum = 1)");
                        dbHelper.insertQuery("INSERT INTO rennfahrerin (teamId, vorname, nachname, nationalitaet, gebDatum)" +
                                "select t.teamId, '" + Vorname.get(random.nextInt(Vorname.size())) + "', '" + Nachname.get(random.nextInt(Nachname.size())) + "', '" + Land.get(random.nextInt(Land.size())) + "', " +
                                "to_date('" + year + "/0" + month + "/" + day + "', 'yyyy/mm/dd') from team t where t.teamId =(select teamId from (select teamid from team order by dbms_random.value) where rownum = 1)");
                    }
                    else {
                        System.out.println("INSERT INTO rennfahrerin (teamId, vorname, nachname, nationalitaet, gebDatum)" +
                                "select t.teamId, '" + Vorname.get(random.nextInt(Vorname.size())) + "', '" + Nachname.get(random.nextInt(Nachname.size())) + "', '" + Land.get(random.nextInt(Land.size())) + "', " +
                                "to_date('" + year + "/0" + month + "/0" + day + "', 'yyyy/mm/dd') from team t where t.teamId =(select teamId from (select teamid from team order by dbms_random.value) where rownum = 1)");
                        dbHelper.insertQuery("INSERT INTO rennfahrerin (teamId, vorname, nachname, nationalitaet, gebDatum)" +
                                "select t.teamId, '" + Vorname.get(random.nextInt(Vorname.size())) + "', '" + Nachname.get(random.nextInt(Nachname.size())) + "', '" + Land.get(random.nextInt(Land.size())) + "', " +
                                "to_date('" + year + "/0" + month + "/0" + day + "', 'yyyy/mm/dd') from team t where t.teamId =(select teamId from (select teamid from team order by dbms_random.value) where rownum = 1)");
                    }
                }
            }
            dbHelper.countDatasetsRennfahrerin();
        } catch (Exception e) {
            System.err.println("Error while executing INSERT INTO RENNFAHRERIN statement: " + e.getMessage());
        }
        //Generator fuer autos
        try {
            String[] Modelle = new String[]{"Civic Type R (EK)", "SLS AMG", "BEAT", "Civic Type R (FK2)", "Fit Hybrid", "Integra Type R (DC2)", "RCZ GT Line", "SWIFT Sport"};
            ArrayList<String> Modell = new ArrayList<String>(List.of(Modelle));

            int f = dbHelper.countRennfahrerin();
            System.out.println("racers found: " + f);
            int i = 0;
            while(i < f) {
                i++;

                int jahr = random.nextInt(2022-1990)+1990;
                int leistung = random.nextInt(202 - 105)+105;
                int gewicht = random.nextInt(1260-935)+935;

                // insert into wagen(teamId, vorname, nachname, modell, jahr, leistung, gewicht)
                //    select r.teamid, r.vorname, r.nachname, 'Civic Type R (EK)', 2008, 175, 980 from(
                //        select a.*, rownum rnum from (select * from rennfahrerin order by gebdatum) a where rownum <= 2) r where rnum >= 2;
                System.out.println("insert into wagen(teamId, vorname, nachname, modell, jahr, leistung, gewicht)" +
                        "select r.teamid, r.vorname, r.nachname, '" + Modell.get(random.nextInt(Modell.size())) + "', " + jahr + ", " + leistung + ", " + gewicht + " from(" +
                        "select a.*, rownum rnum from (select * from rennfahrerin order by gebdatum) a where rownum <= " + i + ") r where rnum >= " + i);
                dbHelper.insertQuery("insert into wagen(teamId, vorname, nachname, modell, jahr, leistung, gewicht)" +
                        "select r.teamid, r.vorname, r.nachname, '" + Modell.get(random.nextInt(Modell.size())) + "', " + jahr + ", " + leistung + ", " + gewicht + " from(" +
                        "select a.*, rownum rnum from (select * from rennfahrerin order by gebdatum) a where rownum <= " + i + ") r where rnum >= " + i);

            }
            dbHelper.countDatasetsWagen();
        } catch(Exception e) {
            System.err.println("Error while executing INSERT INTO WAGEN statement: " + e.getMessage());
        }
        //Generator fuer Runden
        try {
            int f = dbHelper.countWagen();
            System.out.println("cars found: " + f);

            int i = 0;
            while(i < f) {
                i++;

                int r = 1;
                while(r<=10) {
                    int zeit = random.nextInt(720000-480000)+480000;
                    //insert into fahren(autoid, rennverid, runde, rundenzeit)
                    //    select w.autoid, 1, 1, 597232 from(
                    //    select a.*, rownum rnum from (select * from wagen order by autoid) a where rownum <= 2) w where rnum >= 2;
                    System.out.println("insert into fahren(autoid, rennverid, runde, rundenzeit) " +
                            "select w.autoid, 1, " + r + ", " + zeit + " from(" +
                            "select a.*, rownum rnum from (select * from wagen order by autoid) a where rownum <= " + i + ") w where rnum >= " + i);
                    dbHelper.insertQuery("insert into fahren(autoid, rennverid, runde, rundenzeit) " +
                            "select w.autoid, 1, " + r + ", " + zeit + " from(" +
                            "select a.*, rownum rnum from (select * from wagen order by autoid) a where rownum <= " + i + ") w where rnum >= " + i);
                    r++;
                }
            }
            dbHelper.countDatasetsRunden();
        } catch (Exception e) {
            System.err.println("Error while executing INSERT INTO FAHREN statement: " + e.getMessage());
        }
        dbHelper.close();
    }
}



