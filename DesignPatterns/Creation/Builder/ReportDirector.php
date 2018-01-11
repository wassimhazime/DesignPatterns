<?php

/*
 * Maintenant que nous disposons de cette interface de création, 
 * nous pouvons mettre à jour notre méthode de génération
 *  de rapport (appelée directeur) afin qu’elle utilise 
 * l’inferface du monteur.
 */

namespace DesignPatterns\Creation\Builder;

/**
 * Description of ReportDirector
 *
 * @author wassime
 */
class ReportDirector {
  public function createExpenseReport(IReportBuilder $pReportBuilder)
    {
        $data = $this->getExpenseData();
        $pReportBuilder->addTitle($data['meta']['title']);
        $pReportBuilder->addLegend($data['meta']['legend']);
 
        foreach ($data['datas'] as $line){
            $pReportBuilder->addExpense($line['type'], $line['amount']);
        }
        return $pReportBuilder;
    }
    
//... code de récupération des données de dépense
}
