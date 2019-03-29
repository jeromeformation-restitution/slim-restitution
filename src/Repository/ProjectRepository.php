<?php
namespace App\Repository;

use App\Entity\Project;
use App\Generic\Connection;

class ProjectRepository
{

    private $connection;
    public function __construct(Connection $connection)
    {

        $this->connection = $connection;
    }

    public function findBySlug(string $slug):?Project
    {
        $query="SELECT * FROM liste_projets WHERE slug= :slug";
        $resultat=$this->connection->queryPrepared($query, array(':slug' => $slug), Project::class, false);
        return $resultat;
    }

    public function findAll(): array
    {
        $query = "SELECT * FROM liste_projets";
        $resultat = $this->connection->query(
            $query,
            Project::class
        );
        return $resultat;
    }
}
