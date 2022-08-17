<?php
declare(strict_types = 1);

namespace App\Http\Controllers;

require_once $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Core\View;
use App\Core\Model;
use App\Core\ErrorsHandler;

class HomeController extends Controller
{
    /**
     * @var int How many reviews are allowed
     */
    private const AMOUNT_OF_REVIEWS = 3;

    /**
     * @return 'view' for the home page
     */
    public static function index()
    {
        $obj = new Home();

        $data = $obj->getAll();

        return View::render('layouts/home', $data);
    }

    /**
     * Store a new review
     *
     * @param string $name
     * @param string $review
     * @return 'view' for the last review
     */
    public static function store(string $name, string $review)
    {
        $modelObj = new Model;

        // Get user's ip
        $ip = $modelObj->getUsersIp();

        // Check if user's 'ip' exists
        $checkIp = $modelObj->checkAmountOfTheSameValueInOneColumn('ip', $ip, 'review');

        if ( $checkIp >= self::AMOUNT_OF_REVIEWS ) {
            echo "many-reviews";
              exit();
        }

        $newReview = new Home();

        if( $newReview->create($name, $review, $ip) ) {

            // Get the last review
            $data = $newReview->getLast();

            return View::render('layouts/review', $data);
        }
    }

    /**
     * Delete all existing reviews
     */
     public static function delete()
     {
         $obj = new Home;

         if ($obj->destroy()) {
            echo "deleted";
         }
     }
}

// If button 'btn-review' was clicked
if (isset($_POST['review'])) {

    $name = htmlentities(trim($_POST['name']));
    $review = htmlentities(trim($_POST['review']));

    // Check if not empty or too long
    if ( ! $name ) {
        echo 'name-empty'; exit();
    } elseif ( ! $review ) {
        echo 'review-empty'; exit();
    } elseif ( mb_strlen($name) > 25 ) {
        echo 'name-too-long'; exit();
    } elseif ( mb_strlen($review) > 200 ) {
        echo 'review-too-long'; exit();
    }
    // If 'OK'
    else {
        HomeController::store($name, $review);
    }

// If button 'btn-delete-review' was clicked
} elseif (isset($_POST['deleteReview'])) {

    HomeController::delete();
}
