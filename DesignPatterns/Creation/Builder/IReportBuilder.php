<?php

/*
 * Commençons par identifier ce dont est constitué un rapport

Un titre
Une légende
Des dépenses (libellé / valeur)
 */

namespace DesignPatterns\Creation\Builder;

/**
 *
 * @author wassime
 */
interface IReportBuilder {
     public function addTitle($pTitle);
     public function addLegend($pLegend);
     public function addExpense($pType, $pAmount);
}
