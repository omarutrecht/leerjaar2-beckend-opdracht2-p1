<?php

class InstructeurModel
{
    private $db;

    public function __construct()
    {
        $this ->db = new Database();
    }

    public function getInstructeur()
    {
        $sql = "select instructeur.Id  as instructeurid
        ,instructeur.Voornaam
        , instructeur.Tussenvoegsel, 
        instructeur.Achternaam
        , instructeur.Mobiel
        , instructeur.DatumInDienst
        , instructeur.AantalSterren 
from instructeur order by AantalSterren desc";

        $this->db->query($sql);

        return $this->db->resultSet();
    }


    public function getInstructeurId($InstructeurId)
    {
        $sql = " select typevoertuig.TypeVoertuig
		,typevoertuig.Rijbewijscategorie
        ,voertuig.Type
        ,voertuig.Kenteken
        ,voertuig.Bouwjaar
        ,voertuig.Id as voertuigid
        ,voertuig.Brandstof
        ,instructeur.Id as instructeurId
        from typevoertuig
        inner join voertuig on
        voertuig.TypevoertuigId = typeVoertuig.Id
        inner join voertuiginstructeur on
        voertuiginstructeur.VoertuigId = voertuig.Id
        inner join instructeur on
        voertuiginstructeur.InstructeurId = instructeur.Id
        where instructeur.Id = :Id";

        $this->db->query($sql);
        $this->db->bind(':Id', $InstructeurId, PDO::PARAM_INT);
//  resultset krijg ik meerdere namen van het zelfde kolom
        return $this->db->resultSet();
    }



    public function getInstructeurinfo($InstructeurId)
{
        $sql = "select instructeur.Voornaam,
        instructeur.Tussenvoegsel, 
        instructeur.Achternaam,
        instructeur.DatumInDienst,
        instructeur.AantalSterren from instructeur
        where instructeur.Id = :Id";

    $this->db->query($sql);
    $this->db->bind(    ':Id', $InstructeurId, PDO::PARAM_INT);
// single krijg ik 1 naam van 1 kolom
    $result = $this->db->single();
    return $result;

}

function nietGebruiktVoertuig()
    {
        $sql = "SELECT 
        voertuig.Id AS VoertuigId,
          typevoertuig.TypeVoertuig,
         Voertuig.Type,
         Voertuig.Kenteken,
         Voertuig.Bouwjaar,
         instructeur.Id AS InstructeurId,
        voertuig.Brandstof,
        typevoertuig.Rijbewijscategorie

    FROM Voertuig
    LEFT JOIN      voertuiginstructeur
     ON    VoertuigInstructeur.VoertuigId = Voertuig.Id
    LEFT JOIN     typevoertuig 
    ON     typeVoertuig.Id = Voertuig.typeVoertuigId 
    LEFT JOIN     instructeur
    ON     instructeur.Id = voertuiginstructeur.InstructeurId

   WHERE         voertuiginstructeur.VoertuigId is null";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    function selectauto($voertuigid)
    {
       $sql = "

       SELECT instructeur.Voornaam,
              instructeur.Tussenvoegsel,
              instructeur.Achternaam,
              typevoertuig.TypeVoertuig,
              voertuig.Type,
              voertuig.Bouwjaar,
              voertuig.Brandstof,
              voertuig.Kenteken,
              voertuig.Id as voertuigid
       FROM Voertuig
       INNER JOIN voertuiginstructeur ON VoertuigInstructeur.VoertuigId = Voertuig.Id
       INNER JOIN typevoertuig ON typeVoertuig.Id = Voertuig.TypeVoertuigId
       INNER JOIN instructeur ON instructeur.Id = voertuiginstructeur.InstructeurId
       where voertuigid = :voertuigid";
    $this->db->query($sql);
    $this->db->bind(    ':voertuigid', $voertuigid, PDO::PARAM_INT);
    
    

    return $this->db->single();
            
            
        
    }

    function delete($voertuigid)
    {
       $sql = "

       DELETE FROM voertuiginstructeur WHERE VoertuigId = :voertuigid";
    $this->db->query($sql);
    $this->db->bind(    ':voertuigid', $voertuigid, PDO::PARAM_INT);
    
    

    return $this->db->single();
    }
    
   
}