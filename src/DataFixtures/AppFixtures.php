<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($count = 0; $count < 20; $count++) {
            $article = new Article();
            $article->setTitle("Titre " . $count);
            $article->setAuthor("Author".$count);
            $article->setImage("Image".$count);
            $article->setResume("Resume" . $count);
            $article->setCategory("Category".$count);
            $article->setLink("Link".$count);

            $manager->persist($article);
        }
        $manager->flush();
    }
}
