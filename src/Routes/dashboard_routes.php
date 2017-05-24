<?php
/*
 * This file is part of the Goteo Package.
 *
 * (c) Platoniq y Fundación Goteo <fundacion@goteo.org>
 *
 * For the full copyright and license information, please view the README.md
 * and LICENSE files that was distributed with this source code.
 */

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\RedirectResponse;

$dash = new RouteCollection();

$dash->add('dashboard-activity', new Route(
    '/activity',
    array('_controller' => 'Goteo\Controller\DashboardController::activityAction',
        )
));
// Old route Redirection
$dash->add('dashboard-activity-sumary', new Route(
    '/activity/summary',
    array('_controller' => function () {
        return new RedirectResponse("/dashboard/activity");
    })
));

// Project image editing
$dash->add('dashboard-project-edit-images', new Route(
    '/project/{pid}/images',
    array('_controller' => 'Goteo\Controller\DashboardController::walletAction',
        )
));

// Virtual wallet
$dash->add('dashboard-wallet', new Route(
    '/wallet',
    array('_controller' => 'Goteo\Controller\DashboardController::walletAction',
        )
));

// AJAX utils
$dash->add('dashboard-wallet-projects-suggestion', new Route(
    '/ajax/projects-suggestion',
    array('_controller' => 'Goteo\Controller\DashboardController::projectsSuggestionAction',
        )
));

// Projects editing
$dash->add('dashboard-projects-analytics', new Route(
    '/projects/analytics',
    array('_controller' => 'Goteo\Controller\Dashboard\DashboardProjectController::analyticsAction',
        )
));

$dash->add('dashboard-projects-shared-materials', new Route(
    '/projects/shared-materials',
    array('_controller' => 'Goteo\Controller\Dashboard\DashboardProjectController::sharedMaterialsAction',
        )
));

$dash->add('dashboard-projects-save-material-url', new Route(
    '/projects/save-material-url',
    array('_controller' => 'Goteo\Controller\Dashboard\DashboardProjectController::saveMaterialUrlAction',
        )
));

$dash->add('dashboard-projects-update-materials-table', new Route(
    '/projects/update-materials-table',
    array('_controller' => 'Goteo\Controller\Dashboard\DashboardProjectController::updateMaterialsTableAction',
        )
));

$dash->add('dashboard-projects-icon-licenses', new Route(
    '/projects/icon-licenses',
    array('_controller' => 'Goteo\Controller\Dashboard\DashboardProjectController::getLicensesIconAction',
        )
));

$dash->add('dashboard-projects-save-new-material', new Route(
    '/projects/save-new-material',
    array('_controller' => 'Goteo\Controller\Dashboard\DashboardProjectController::saveNewMaterialAction',
        )
));

return $dash;
