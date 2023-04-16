Kedves Javító!

Kérjük a weboldal megtekintése előtt indítsa el a XAMPP programot, azon belül is egy Apache, és MySQL szervert, ugyanis az adatok kezelését MySQL-el oldottuk meg.
Az Apache szerver httpd.conf konfigurációs fájlban írja be a DocumentRoot utáni idézőjelek közé a kicsomagolás útvonalát és írja hozzá a "/Webterv-projekt-main/Projektmunka" elérési útvonalat majd ezt ismételje meg az ezalatt levő Directory idézőjeleivel is.

Kérjük, ha a MySQL szerver adatai nem egyeznek meg az alapértelmezett adatokkal írja át őket mindenhol a saját MySQL szerverének adataira. (bocsánat)
Az alapértelmezett adatok:
Szervernév: "localhost"
Felhasználónév: "root"
Jelszó: ""
Kérjük az adatbázis nevét ne írja át "Macskalak"-ról kivéve, ha ezt mindenhol megteszi! 

Mindezek után nyissa meg a PHP/MySQLInicialization.php fájlt egy tetszőleges böngészőben, hogy az adatbázis inicializálódjon alapértelmezett adataival.
Emellett a PHP/DeleteDataBase.php fájl segítségével tudja törölni a teljes adatbázist, ha szükség lenne rá.. (Tudom, hogy nem ocd-s, de az elején csináltuk meg)
Ha mindezt megtette akkor a weboldal készen áll a tesztelésre. 

Reméljük tetszeni fog a weboldalunk.

Üdv,
Valentin, és Kevin
