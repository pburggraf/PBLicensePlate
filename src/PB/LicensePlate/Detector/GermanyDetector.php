<?php

namespace PB\LicensePlate\Detector;

use PB\LicensePlate\Response\LicensePlateResponse;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class GermanyDetector extends AbstractDetector
{
    const PLATE_TYPE_DEFAULT = 1;
    const PLATE_TYPE_GOVERNMENT = 2;
    /**
     * @var array
     */
    protected static $validDistricts = array(
        'A' => array(
            'Stadt Augsburg' => '^(?:[A-Z]{2} [0-9]{1,2}$|^[A-O]{2} [0-9]{3}$|^[Q-Z]{2} [0-9]{3}$|^[A-Z]{2} [1-4][0-9]{3})$',
            'Landkreis Augsburg' => '^(?:[A-Z] [1-9][0-9]{0,3}$|^[A-Z]{2} [5-9][0-9]{3})$',
            'Polizeipräsidium Schwaben Nord' => '^PS [1-9][0-9]{2}$',
        ),
        'AA' => array(
            'Ostalbkreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AB' => array(
            'Landkreis Aschaffenburg' => '^[A-Z]{2} [1-9][0-9]{2,3}$',
            'Stadt Aschaffenburg' => '^(?:[A-Z]{2} [1-9][0-9]{0,1}$|^[A-Z] [1-9][0-9]{0,3})$',
        ),
        'ABG' => array(
            'Landkreis Altenburger Land' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ABI' => array(
            'Landkreis Anhalt-Bitterfeld' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AC' => array(
            'Städteregion Aachen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AE' => array(
            'Vogtlandkreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AH' => array(
            'Kreis Borken' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AIB' => array(
            'Landkreis München/Landkreis Rosenheim' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AIC' => array(
            'Landkreis Aichach-Friedberg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AK' => array(
            'Landkreis Altenkirchen (Westerwald)' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ALF' => array(
            'Landkreis Hildesheim' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ALZ' => array(
            'Landkreis Aschaffenburg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AM' => array(
            'Stadt Amberg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ANA' => array(
            'Erzgebirgskreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ANG' => array(
            'Landkreis Uckermark' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ANK' => array(
            'Landkreis Vorpommern-Greifswald' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AN' => array(
            'Landkreis Ansbach' => '^[A-Z]{2} [1-9][0-9]{0,2}$',
            'Stadt Ansbach' => '^(?:[A-Z]{2} [1-9][0-9]{0,1}$|^[A-Z]{2} [1-9][0-9]{3}$|^[A-Z] [1-9][0-9]{0,3})$',
        ),
        'APD' => array(
            'Landkreis Weimarer Land' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AP' => array(
            'Landkreis Weimarer Land' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ARN' => array(
            'Ilm-Kreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ART' => array(
            'Kyffhäuserkreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ASL' => array(
            'Salzlandkreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ASZ' => array(
            'Erzgebirgskreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AS' => array(
            'Landkreis Amberg-Sulzbach' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AT' => array(
            'Landkreis Mecklenburgische Seenplatte' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AUR' => array(
            'Landkreis Aurich' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AU' => array(
            'Erzgebirgskreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AW' => array(
            'Landkreis Ahrweiler' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AZE' => array(
            'Landkreis Anhalt-Bitterfeld' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AZ' => array(
            'Landkreis Alzey-Worms' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'AÖ' => array(
            'Landkreis Altötting' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),

        'BAD' => array(
            'Stadt Baden-Baden' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BAR' => array(
            'Landkreis Barnim' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BA' => array(
            'Stadt Bamberg / Landkreis Bamberg' => '^(?:P [1-9][0-9]{0,2}$|^[A-O] [1-9][0-9]{0,3}$|^[Q-Z] [1-9][0-9]{0,3}$|^[A-Z]{2} [1-9][0-9]{0,3})$',
            'Bayerisches Bereitschaftspolizeipräsidium' => '^P [1-9][0-9]{2,4}$',
        ),
        'BBG' => array(
            'Salzlandkreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BB' => array(
            'Landkreis Böblingen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BCH' => array(
            'Neckar-Odenwald-Kreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BC' => array(
            'Landkreis Biberach' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BED' => array(
            'Landkreis Mittelsachsen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BER' => array(
            'Landkreis Barnim' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BE' => array(
            'Kreis Warendorf' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BF' => array(
            'Kreis Steinfurt' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BGL' => array(
            'Landkreis Berchtesgadener Land' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BH' => array(
            'Ortenaukreis' => '^F 7[0-9]{3}$|^N 8[0-9]{3}$|^O 2[0-9]{3}$|^OF (?:[1-6][0-9]{0,3}$|^[0-9]{1,3}$)$|^OG 9[0-9]{3}$|^OP (?:[1-4][0-9]{0,3}$|^[0-9]{1,3}$)$|^OK 3[0-9]{3}$',
            'Landkreis Rastatt' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BID' => array(
            'Landkreis Marburg-Biedenkopf' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BIN' => array(
            'Landkreis Mainz-Bingen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BIR' => array(
            'Landkreis Birkenfeld' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BIT' => array(
            'Eifelkreis Bitburg-Prüm' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BIW' => array(
            'Landkreis Bautzen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BI' => array(
            'Stadt Bielefeld' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BKS' => array(
            'Landkreis Bernkastel-Wittlich' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BK' => array(
            'Rems-Murr-Kreis' => '^[A-Z] [1-9][0-9]{0,3}$|^[A-Z]{1,2} [1-9][0-9]{0,1}$',
            'Landkreis Börde' => '^[A-Z]{2} [1-9][0-9]{2,3}$',
        ),
        'BLB' => array(
            'Kreis Siegen-Wittgenstein' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BLK' => array(
            'Burgenlandkreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BL' => array(
            'Zollernalbkreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BM' => array(
            'Rhein-Erft-Kreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BNA' => array(
            'Landkreis Leipzig' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BN' => array(
            'Stadt Bonn' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BOH' => array(
            'Kreis Borken' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BOR' => array(
            'Kreis Borken' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BOT' => array(
            'Stadt Bottrop' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BO' => array(
            'Stadt Bochum' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BRA' => array(
            'Landkreis Wesermarsch' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BRB' => array(
            'Stadt Brandenburg an der Havel' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BRG' => array(
            'Landkreis Jerichower Land' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BRK' => array(
            'Landkreis Bad Kissingen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BRL' => array(
            'Landkreis Goslar' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BRV' => array(
            'Landkreis Rotenburg (Wümme)' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BS' => array(
            'Stadt Braunschweig' => '^[A-Z] [1-9][0-9]{0,3}$|^[A-Z]{2} [1-9][0-9]{0,1}$|^[A-O]{2} [1-9][0-9]{2,3}$|^[Q-Z]{2} [1-9][0-9]{2,3}$',
            'Polizeidirektion Braunschweig' => '^PD [1-9][0-9]{2,3}$',
        ),
        'BTF' => array(
            'Landkreis Anhalt-Bitterfeld' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BT' => array(
            'Stadt Bayreuth / Landkreis Bayreuth' => '^[A-Z]{2} [1-9][0-9]{0,3}$|^[A-O] [1-9][0-9]{0,3}$|^[Q-Z] [1-9][0-9]{0,3}$|^P [1-9][0-9]{0,2}$|^P 7[0-9]{3}$',
            'Polizeipräsidium Oberfranken' => '^P [8-9][0-9]{3}$',
        ),
        'BUL' => array(
            'Landkreis Schwandorf' => '^[A-Z]{2} [1-9][0-9]{0,3}$|^[A|C-E|H-Z] [1-9][0-9]{0,3}$',
            'Landkreis Amberg-Sulzbach' => '^[BFG]{1} [1-9][0-9]{0,2}$',
        ),
        'BZ' => array(
            'Landkreis Bautzen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BÖ' => array(
            'Landkreis Börde' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BÜD' => array(
            'Wetteraukreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BÜR' => array(
            'Kreis Paderborn' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BÜS' => array(
            'Gemeinde Büsingen am Hochrhein' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'BÜZ' => array(
            'Landkreis Rostock' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'B' => array(
            'Stadt Berlin' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),

        'CAS' => array(
            'Kreis Recklinghausen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'CA' => array(
            'Landkreis Oberspreewald-Lausitz' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'CB' => array(
            'Stadt Cottbus' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'CE' => array(
            'Landkreis Celle' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'CHA' => array(
            'Landkreis Cham' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'CLP' => array(
            'Landkreis Cloppenburg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'CLZ' => array(
            'Landkreis Goslar' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'COC' => array(
            'Landkreis Cochem-Zell' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'COE' => array(
            'Kreis Coesfeld' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'CO' => array(
            'Stadt Coburg / Landkreis Coburg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'CR' => array(
            'Landkreis Schwäbisch Hall' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'CUX' => array(
            'Landkreis Cuxhaven' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'CW' => array(
            'Landkreis Calw' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'C' => array(
            'Stadt Chemnitz' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),

        'DAH' => array(
            'Landkreis Dachau' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DAN' => array(
            'Landkreis Lüchow-Dannenberg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DAU' => array(
            'Landkreis Vulkaneifel' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DA' => array(
            'Stadt Darmstadt / Landkreis Darmstadt-Dieburg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DBR' => array(
            'Landkreis Rostock' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DD' => array(
            'Dresden' => '^(?:[A-P|R-Z]{1,2} [1-9][0-9]{0,3}|Q [1-9][0-9]{0,2})$',
            'Polizei Sachsen' => '^Q [1-9][0-9]{3}$',
        ),
        'DEG' => array(
            'Landkreis Deggendorf' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DEL' => array(
            'Stadt Delmenhorst' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DE' => array(
            'Stadt Dessau-Roßlau' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DGF' => array(
            'Landkreis Dingolfing-Landau' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DH' => array(
            'Landkreis Diepholz' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DIL' => array(
            'Lahn-Dill-Kreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DIN' => array(
            'Kreis Wesel' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DIZ' => array(
            'Rhein-Lahn-Kreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DI' => array(
            'Landkreis Darmstadt-Dieburg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DKB' => array(
            'Landkreis Ansbach' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DLG' => array(
            'Landkreis Dillingen an der Donau' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DL' => array(
            'Landkreis Mittelsachsen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DM' => array(
            'Landkreis Mecklenburgische Seenplatte' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DN' => array(
            'Kreis Düren' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DON' => array(
            'Landkreis Donau-Ries' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DO' => array(
            'Stadt Dortmund' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DUD' => array(
            'Landkreis Göttingen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DU' => array(
            'Stadt Duisburg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DW' => array(
            'Landkreis Sächsische Schweiz-Osterzgebirge' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DZ' => array(
            'Landkreis Nordsachsen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'DÜW' => array(
            'Landkreis Bad Dürkheim' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'D' => array(
            'Stadt Düsseldorf' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),

        'EA' => array(
            'Stadt Eisenach' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EBE' => array(
            'Landkreis Ebersberg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EBN' => array(
            'Landkreis Haßberge' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EBS' => array(
            'Landkreis Kulmbach' => '^[A-M] [1-9][0-9]{0,2}$',
            'Landkreis Bayreuth' => '^[N-Z] [1-9][0-9]{0,2}$',
            'Landkreis Forchheim' => '(?:^[A-Z] [1-9][0-9]{3}$|^[A-Z]{2} [1-9][0-9]{0,3}$)',
        ),
        'EB' => array(
            'Landkreis Nordsachsen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ECK' => array(
            'Kreis Rendsburg-Eckernförde' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ED' => array(
            'Landkreis Erding' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EE' => array(
            'Landkreis Elbe-Elster' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EF' => array(
            'Stadt Erfurt' => '(?:^[A-KM-OQ-Z]{1,2} [1-9][0-9]{0,3}$|^[LP]{1,2} [1-9][0-9]{0,2}$)',
            'Thüringer Polizei' => '^LP [1-9][0-9]{3}$',
        ),
        'EG' => array(
            'Landkreis Rottal-Inn' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EIC' => array(
            'Landkreis Eichsfeld' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EIL' => array(
            'Landkreis Mansfeld-Südharz' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EIN' => array(
            'Landkreis Northeim' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EIS' => array(
            'Saale-Holzland-Kreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EI' => array(
            'Landkreis Eichstätt' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EL' => array(
            'Landkreis Emsland' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EMD' => array(
            'Stadt Emden' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EMS' => array(
            'Rhein-Lahn-Kreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EM' => array(
            'Landkreis Emmendingen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EN' => array(
            'Ennepe-Ruhr-Kreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ERB' => array(
            'Odenwaldkreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ERH' => array(
            'Landkreis Erlangen-Höchstadt' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ERK' => array(
            'Kreis Heinsberg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ERZ' => array(
            'Erzgebirgskreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ER' => array(
            'Stadt Erlangen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ESB' => array(
            'Landkreis Neustadt an der Waldnaab' => '^(?:[BFGIOQ] [1-9][0-9]{3}|[A-Z][A-SU-Z] [1-9][0-9]{0,3}|[A-Z]T [1-9][0-9]{2,3}|[AC-EHJ-MPR-Z] [1-9][0-9]{0,3}|N [1-9][0-9]{3})$',
            'Landkreis Amberg-Sulzbach' => '^[BFGIOQ] [1-9][0-9]{0,2}$',
            'Landkreis Bayreuth' => '^[A-Z]T [1-9][0-9]{0,1}$',
            'Landkreis Nürnberger Land' => '^N [1-9][0-9]{0,2}$',
        ),
        'ESW' => array(
            'Werra-Meißner-Kreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ES' => array(
            'Landkreis Esslingen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EU' => array(
            'Kreis Euskirchen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'EW' => array(
            'Landkreis Barnim' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'E' => array(
            'Stadt Essen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        
        'FB' => array(
            'Wetteraukreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FDB' => array(
            'Landkreis Aichach-Friedberg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FDS' => array(
            'Landkreis Freudenstadt' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FD' => array(
            'Landkreis Fulda' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FEU' => array(
            'Landkreis Ansbach' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FFB' => array(
            'Landkreis Fürstenfeldbruck' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FF' => array(
            'Stadt Frankfurt (Oder)' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FG' => array(
            'Landkreis Mittelsachsen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FI' => array(
            'Landkreis Elbe-Elster' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FKB' => array(
            'Landkreis Waldeck-Frankenberg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FLÖ' => array(
            'Landkreis Mittelsachsen' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FL' => array(
            'Stadt Flensburg' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FN' => array(
            'Bodenseekreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FOR' => array(
            'Landkreis Spree-Neiße' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FO' => array(
            'Landkreis Forchheim' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FRG' => array(
            'Landkreis Freyung-Grafenau' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FRI' => array(
            'Landkreis Friesland' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FRW' => array(
            'Landkreis Märkisch-Oderland' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FR' => array(
            'Stadt Freiburg im Breisgau / Landkreis Breisgau-Hochschwarzwald' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FS' => array(
            'Landkreis Freising' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FTL' => array(
            'Landkreis Sächsische Schweiz-Osterzgebirge' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FT' => array(
            'Stadt Frankenthal (Pfalz)' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FZ' => array(
            'Schwalm-Eder-Kreis' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FÜS' => array(
            'Landkreis Ostallgäu' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'FÜ' => array(
            'Landkreis Fürth' => '^[A-Z]{2} [1-9][0-9]{0,2}$',
            'Stadt Fürth' => '^(?:[A-Z]{2} [1-9][0-9]{0,1}$|^[A-Z]{2} [1-9][0-9]{3}$|^[A-Z] [1-9][0-9]{0,3})$',
        ),
        'F' => array(
            'Stadt Frankfurt am Main' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),

        'GAN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GAP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GDB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GEO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GER' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GHA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GHC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GLA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GMN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GNT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GOA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GOH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GRA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GRH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GRI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GRM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GRZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GTH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GUB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GUN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GVM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GV' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GÖ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'GÜ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'G' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HAB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HAL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HAM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HAS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HBN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HBS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HCH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HDH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HDL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HEB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HEF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HEI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HER' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HET' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HGN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HGW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HHM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HIG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HIP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HMÜ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HOG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HOH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HOL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HOM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HOR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HOT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HRO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HSK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HST' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HU' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HVL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HV' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HWI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HX' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HY' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'HÖS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'H' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'IGB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'IK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ILL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'IL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'IN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'IZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'JE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'JL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'JÜL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'J' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KEH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KEL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KEM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KIB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KLE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KLZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KRU' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KUS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KU' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KYF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KY' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KÖN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KÖT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KÖZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'KÜN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'K' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LAU' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LBS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LBZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LDK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LDS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LEO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LER' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LEV' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LIB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LIF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LIP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LOS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LRO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LSZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LUP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LU' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LWL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LÖB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LÖ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'LÜN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'L' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MAB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MAI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MAK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MAL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MED' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MEG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MEI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MEK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MER' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MET' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ME' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MGH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MGN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MHL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MIL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MKK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ML' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MOD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MOL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MON' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MOS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MQ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MSE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MSH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MSP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MST' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MTK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MTL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MYK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MY' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MZG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MÜB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MÜR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'MÜ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'M' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NAB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NAI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NAU' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NDH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ND' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NEA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NEB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NEC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NEN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NES' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NEW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NMB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NMS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NOH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NOL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NOM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NOR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NU' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NVP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NWM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NY' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'NÖ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'N' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OAL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OBG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OCH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OHA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OHV' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OHZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OPR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OSL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OVI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OVL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'OZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PAF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PAN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PAR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PCH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PEG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PIR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PLÖ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PRÜ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'PZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'P' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'QFT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'QLB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RDG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'REG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'REH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RID' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RIE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ROD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ROF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ROK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ROL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ROS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ROT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ROW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RSL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RU' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RV' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RÜD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'RÜG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'R' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SAB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SAD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SAN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SAW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SBG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SBK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SCZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SDH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SDL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SDT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SEB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SEE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SEF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SEL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SFB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SFT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SGH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SHA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SHG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SHK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SHL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SIG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SIM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SLE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SLF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SLK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SLN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SLS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SLZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SLÜ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SOB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SOG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SOK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SON' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SPB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SPN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SRB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SRO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'STA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'STB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'STD' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'STE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'STL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ST' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SUL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SU' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SWA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SZB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SÖM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'SÜW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'S' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TBB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TDO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TET' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TIR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TUT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TÖL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'TÜ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'UEM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'UE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'UFF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'UH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'UL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'UM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'UN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'USI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VAI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VEC' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VER' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VIB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VIE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VOH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'VS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'V' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WAF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WAK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WAN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WAT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WBS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WDA' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WEL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WEN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WER' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WES' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WHV' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WIL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WIS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WIT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WIZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WK' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WLG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WMS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WND' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WOB' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WOH' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WOL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WOR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WOS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WO' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WRN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WSF' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WST' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WSW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WS' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WTM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WT' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WUG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WUN' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WUR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WZL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WÜM' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'WÜ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'W' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ZEL' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ZE' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ZIG' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ZI' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ZP' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ZR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ZW' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ZZ' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'Z' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
        'ÖHR' => array(
            '' => '^[A-Z]{1,2} [1-9][0-9]{0,3}$',
        ),
    );
    const PLATE_TYPE_DIPLOMATIC_CORPS = 3;
    const PLATE_TYPE_FEDERAL = 4;
    const PLATE_TYPE_LOCAL_POLICE = 5;

    const PLATE_TYPE_MILITARY = 6;

    protected $diplomaticCorps = array();

    /**
     * @return LicensePlateResponse
     */
    public function parse()
    {
        // match default plate layout (inclusive historic)
        if (preg_match('/^[A-ZÄÖÜ]{1,3} [A-Z]{1,2} \d{1,4}[H]?$/', $this->normalizedLicensePlate) === 1) {
            $plateParts = $this->seperatedLicensePlate;

            // check if the frist block is a valid german district
            if (array_key_exists($plateParts[0], self::$validDistricts)) {
                $this->response->setValid(true);
                $this->response->setType(self::PLATE_TYPE_DEFAULT);

                $this->response->addDetail($this->getDistrictInformation());

                // it is not possible to have 3 characters in the first block combined with 2 characters and 4 numbers
                if (strlen($plateParts[0]) === 3 && strlen($plateParts[1]) === 2 && strlen($plateParts[2]) > 3) {
                    $this->response->setValid(false);
                    $this->response->setType(self::PLATE_TYPE_UNKNOWN);
                }
            }
        }

        // match gov. plate layout
        if (preg_match('/^\d{1,2} \d{1,2}$/', $this->normalizedLicensePlate) === 1) {
            $this->response->setValid(true);
            $this->response->setType(self::PLATE_TYPE_GOVERNMENT);
        }

        // match plates of the diplomatic corps
        if (preg_match('/^(?:(?:0|B|BN) \d{2,3} \d{1,3}[A-Z]?|[A-Z]{1,3} 9\d{2,4}[A-Z]?)$/', $this->normalizedLicensePlate) === 1) {
            $this->response->setValid(true);
            $this->response->setType(self::PLATE_TYPE_DIPLOMATIC_CORPS);
        }

        // match fed. plate layout
        if (preg_match('/^B[P|D|W] \d{1,2} \d{1,4}$/', $this->normalizedLicensePlate) === 1) {
            $this->response->setValid(true);
            $this->response->setType(self::PLATE_TYPE_FEDERAL);
        }

        // match local police cars
        if (preg_match('/^(?:(?:NRW|BWL|BBL|RPL|SAL) (?:[4-6]{1}? )\d{1,4}|(?:B|LSA|SH) \d{1,5}|(?:HB|HH) \d{1,4}|MVL 3\d{1,4}|(?:WI HP|DD Q|EF LP) \d{1,4})$/', $this->normalizedLicensePlate) === 1) {
            $this->response->setValid(true);
            $this->response->setType(self::PLATE_TYPE_LOCAL_POLICE);
        }

        // match military plate layout
        if (preg_match('/^Y (?:\d{1,4} \d{1,4}|\d{1,6})$/', $this->normalizedLicensePlate) === 1) {
            $this->response->setValid(true);
            $this->response->setType(self::PLATE_TYPE_MILITARY);
        }

        return $this->response;
    }

    /**
     * @return string|null
     */
    protected function getDistrictInformation()
    {
        $districInformation = static::$validDistricts[$this->seperatedLicensePlate[0]];

        foreach ($districInformation as $districtName => $districtRegex) {
            if (preg_match('/' . $districtRegex . '/', $this->seperatedLicensePlate[1] . ' ' . $this->seperatedLicensePlate[2])) {
                return $districtName;
            }
        }
        return null;
    }
}
