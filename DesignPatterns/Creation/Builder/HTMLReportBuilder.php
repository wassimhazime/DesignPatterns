<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DesignPatterns\Creation\Builder;

/**
 * Description of HTMLReportBuilder
 *
 * @author wassime
 */
class HTMLReportBuilder implements IReportBuilder {

    //... protected attributes
    public function addTitle($pTitle) {
        $this->_title = htmlentities($pTitle);
    }

    public function addLegend($pLegend) {
        $this->_legend = htmlentities($pLegend);
    }

    public function addExpense($pType, $pAmount) {
        $this->_expenses .= '<tr><td>' .
                htmlentities($pType) . '</td><td>' .
                $pAmount . '</td></tr>';
    }

    public function getReport() {
        return '<h2>' . $this->_title . '</h2>'
                . '<p>' . $this->_legend . '</p>'
                . '<table>'
                . '<tr><th>Type de dépense</th><th>Montant</th>'
                . $this->_expenses
                . '</table>';
    }

}
