<?php

class RadninalogDB {

    public static function getRadninalog() {
        $db = Database::getDB();
        $query = "SELECT n.id_radni_nalog, n.id_radnik, n.id_klijent, n.Rad_id_radnik, 
n.datum_zahteva, n.pocetak_rada, n.zahtevano, n.uradjeno, n.drugi_komentar,
 n.broj_sati, k.naziv_k, k.ime_k, k.prezime_k, r1.ime_r as imeizvrsioca, r1.prezime_r as prezimeizvrsioca, r2.ime_r as imevodje, r2.prezime_r as prezimevodje
FROM radninalog n
INNER JOIN radnik r1
ON n.id_radnik= r1.id_radnik
INNER JOIN radnik r2
ON n.Rad_id_radnik= r2.id_radnik
INNER join klijent k
ON k.id_klijent=n.id_klijent
ORDER BY id_radni_nalog DESC";

        $result = $db->query($query);

        foreach ($result as $row) {

            $klijent = new Klijent1();

            $klijent->setIdklijent($row['id_klijent']);
            $klijent->setNaziv($row['naziv_k']);
            $klijent->setIme($row['ime_k']);
            $klijent->setPrezime($row['prezime_k']);

            $radnik1 = new radnik1();
            $radnik1->setIme($row['imeizvrsioca']);
            $radnik1->setPrezime($row['prezimeizvrsioca']);
            $radnik2 = new radnik1();
            $radnik2->setIme($row['imevodje']);
            $radnik2->setPrezime($row['prezimevodje']);

            $radninalog = new Radninalog($radnik2, $klijent, $radnik1
                    , $row['datum_zahteva'], $row['pocetak_rada'], $row['zahtevano'], $row['uradjeno']
                    , $row['drugi_komentar'], $row['broj_sati']);

            $radninalog->setIdradninalog($row['id_radni_nalog']);

            $radninalozi[] = $radninalog;
        }

        return $radninalozi;
    }

    public static function getRadninalogradnik() {
        $db = Database::getDB();
        $query = "SELECT * FROM radninalog";
        $result = $db->query($query);

        foreach ($result as $row) {
            $radninalog = new Radninalog($row['id_radnik'], $row['id_klijent'], $row['Rad_id_radnik']
                    , $row['datum_zahteva'], $row['pocetak_rada'], $row['zahtevano'], $row['uradjeno']
                    , $row['drugi_komentar'], $row['broj_sati']);

            $radninalog->setIdradninalog($row['id_radni_nalog']);

            $radninalozi[] = $radninalog;
        }
        return $radninalozi;
    }

    public static function setRadninalog($radninalog) {
        $db = Database::getDB();

        $id_radnik = $radninalog->getIdradnik();
        $id_klijent = $radninalog->getIdklijent();
        $Rad_id_radnik = $radninalog->getIdradnikrad();
        $datum_zahteva = $radninalog->getDatumzahteva();
        $pocetak_rada = $radninalog->getPocetakrada();
        $zahtevano = $radninalog->getZahtevano();
        $uradjeno = $radninalog->getUradjeno();
        $drugi_komentar = $radninalog->getDrugikomentar();
        $broj_sati = $radninalog->getBrojsati();
        $query = "INSERT INTO radninalog
                 ( id_radnik, id_klijent, Rad_id_radnik, datum_zahteva, pocetak_rada, zahtevano, uradjeno, drugi_komentar, broj_sati)
             VALUES
                 ( '$id_radnik', '$id_klijent', '$Rad_id_radnik', '$datum_zahteva', '$pocetak_rada', '$zahtevano', '$uradjeno', '$drugi_komentar', '$broj_sati')";

        $row_count = $db->exec($query);
        return $row_count;
    }

    public static function getIDradninalog() {
        $db = Database::getDB();
        $query = "select max( id_radni_nalog) from radninalog ";
        $result = $db->query($query);

        $r = $result->fetch(PDO::FETCH_NUM);

        return $r[0];
    }

}
