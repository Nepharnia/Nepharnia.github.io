<?php
	require_once '../debugaide.php';

	class Events {
		
		private $db;
	
		public function __construct(\PDO $db)
		{
			$this->db = $db;
		}

		/**
		 *Récupère les évènements commençant entre 2 dates
		 */
		
		public function getEventsBetween (\DateTime $start, \DateTime $end) : array {
			
			$sql= "SELECT * FROM agenda WHERE start BETWEEN '{$start->format('Y-m-d 00:00:00')}' AND '{$end->format('Y-m-d 23:59:59')}' ORDER BY start ASC";
			//var_dump($sql);
			$statement = $this->db->query($sql);
			$results = $statement->fetchAll();

			return $results;
		}
		
		/**
			*Récupère les évènements commençant entre 2 dates indexé par jour
			*/
		public function getEventsBetweenByDay (\DateTime $start, \DateTime $end) : array {
			$events = $this->getEventsBetween($start, $end);
			$days = [];
			foreach($events as $event) {
				$date = explode(' ', $event['start'])[0];
				if (!isset($days[$date])) {
					$days[$date] = [$event];
				} else {
					$days[$date][] = $event;
				}
			}
			return $days;
		}
		/**
			*Renvoie un évènement s'il est renseigné sinon renvoie une erreur
			*/
		
		public function find (int $id): Evenement {
			
			require 'Class_Evenement.php';
			
			$statement = $this->db->query("SELECT * FROM agenda WHERE idAg = $id");
			$statement->setFetchMode(PDO::FETCH_CLASS, "Evenement");
			$resultat = $statement->fetch();
			if ($resultat === false) {
				throw new Exception('Aucun évènement n\'a été trouvé');
			}
			return $resultat;

		}

		/**
		 * Créer un évènement dans la BDD
		 */
		public function create (Evenement $event): bool {
			$statement = $this->db->prepare('INSERT INTO agenda (event, description, start, end, lieu, idUsr_ag) VALUES (?, ?, ?, ?, ?, ?)');
			return $statement->execute([
				$event->getName(),
				$event->getDescription(),
				$event->getStart()->format('Y-m-d H:i:s'),
				$event->getEnd()->format('Y-m-d H:i:s'),
				$event->getLieu(),
				$event->getidUsr()
			]);
		}

		/**
		 * Met à jour l'évènement au niveau de la BDD
		 */
		public function update(Evenement $event) {
			$statement = $this->db->prepare('UPDATE agenda SET event = ?, description = ?, start = ?, end = ?, lieu = ? WHERE idAg = ?');
			return $statement->execute([
				$event->getName(),
				$event->getDescription(),
				$event->getStart()->format('Y-m-d H:i:s'),
				$event->getEnd()->format('Y-m-d H:i:s'),
				$event->getLieu(),
				$event->getId()
			]);
		}

		/**
		 * Supprimer l'évènement de la BDD
		 */
		public function delete(Evenement $event) {
			$statement = $this->db->prepare('DELETE FROM agenda WHERE idAg = ?');
			return $statement->execute([
				$event->getId(),
			]);
		}
	}