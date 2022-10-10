# A rendszer célja

A rendszer célja egy dinamikus és a fiatalságot megszólító viccoldal megvalósítása.
A mai felgyorsult világban sok ember vágyát kell teljesíteni, legfőképpen a humor szempontjából, ami miatt mi dinamikusak kívánunk lenni.
A weboldal rendelkezik jogosultsági körökkel, így csak a regisztráltak tölthetnek fel tartalmat, illetve csak a moderátorok törölhetik mások posztjait és tilthatnak ki embereket.
A végén egy szórakoztató és vicces weboldalt kapunk, amely biztonságos környezetet biztosít a nevetni vágyóknak.

# Üzleti folyamatok modellje
![uzleti_folyamat_modell](https://user-images.githubusercontent.com/113434354/193841204-4f0c90ce-38c3-491e-bd02-be316f64f313.jpg)
# Funkcionális tervek

Rendszerszereplők:
Admin
Moderátor
User
Guest

Rendszerhasználati esetek és lefutásaik:

ADMIN:
    Jóváhagyja a beküldött vicceket
    Bármely felhasználó tartalmát törölheti, módosíthatja
    Felhasználó törlése adatbázisból
    Viccek feltöltése
    Adatbázishoz való hozzáférés
    Viccek kategorizálása
MODERÁTOR:
    Jóváhagyja a beküldött vicceket
    Bármely felhasználó tartalmát törölheti, módosíthatja
    Viccek feltöltése
    Viccek kategorizálása
USER:
    Viccek feltöltése
    Viccek kategorizálása
    Saját tartalmát módosíthatja, és törölheti
GUEST:
   Főoldal megtekintése 

# Fizikai környezet

A fórum web platformra készül.
Fejlesztői eszközök:
    Visual Studio Code
    XAMPP
    Diagrams.net

# Adatbázis terv
<img width="411" alt="adatbazis_model" src="https://user-images.githubusercontent.com/113434354/193841446-4a2fc2d3-364a-402e-b42b-1509155c8b84.PNG">
