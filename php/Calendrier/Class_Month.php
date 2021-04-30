<?php

class Month {
	
	private $months = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
	public $month;
	public $year;
	public $days =["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
	
	/**
	 *$month le mois compris entre 1 et 12
	 *$year l'année
	 */
	
	public function __construct(?int $month = null, ?int $year = null)
	{
		if ($month === null) {
			$month = intval(date('m'));
		}
		
		if ($year === null){
			$year = intval(date('Y'));
		}
		
		if ($month < 1 || $month > 12) {
			throw new Exception("Le mois $month n'est pas valide");
		}
		
		if ($year < 1970) {
			throw new Exception("L'année est inférieur à 1970");
		}
		
		$this->month = $month;
		$this->year = $year;
	}
	
	/**
	 *retourne le mois en toute lettre
	 */
	
	public function toString(): string {
		return $this->months[$this->month - 1] . ' ' . $this->year;
	}
	
	/**
	 *renvoie le nombre de semaine dans le mois
	 */
	
	public function getWeeks() : int {
		$start = new \DateTime("{$this->year}-{$this->month}-01");
		//var_dump ($start);
		$end = (clone $start)->modify('+1 month -1 day');
		//var_dump ($end);
		$weeks = intval($end->format ('W')) - intval($start->format('W')) +1;
		if ($weeks < 0) {
			$weeks = intval($end->format ('W'));
		}
		//var_dump ($weeks);
		return $weeks;
	}
	
	/**
	 *retourne le 1er jour du mois
	 */
	
	public function getStartingDay() : \DateTime {
		return new \DateTime("{$this->year}-{$this->month}-01");
	}
	/**
	 *Renvoie si la date est dans le mois en cours
	 */
	public function withinMonth (\DateTime $date) : bool {
		return $this->getStartingDay()->format('Y-m') === $date->format('Y-m');
	}
	/**
	 *Permet de renvoyer le mois suivant
	 */
	
	public function nextMonth () : Month {
		$month = $this->month + 1;
		$year = $this->year;
		if ($month > 12) {
			$month = 1;
			$year += 1;
		}
		return new Month($month, $year);
	}
	
	/** 
	 *Permet de renvoyer le mois précédent
	 */
	
	public function previousMonth() : Month {
		$month = $this->month - 1;
		$year = $this->year;
		if ($month < 1) {
			$month = 12;
			$year -= 1;
		}
		return new Month($month, $year);
	}
}