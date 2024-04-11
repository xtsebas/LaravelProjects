<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Book extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title', 'LIKE', '%' . $title . '%');
    }

    public function scopePopular(Builder $query, $from = null, $to = null): Builder
    {
        return $query->withCount(['reviews' => fn (Builder $q) => $this->dateRangeFilter($q, $from, $to) ])
        ->orderBy('reviews_count', 'desc');
    }

    public function scopeHighestRated(Builder $query, $from = null, $to = null): Builder
    {
        return $query->withAvg(['reviews' => fn (Builder $q) => $this->dateRangeFilter($q, $from, $to) ], 'rating')->orderBy('reviews_avg_rating', 'desc');
    }

    public function scopeMinReviews(Builder $query, int $minReviews): Builder
    {
        return $query->having('reviews_count', '>=', $minReviews);
    }
 
    private function dateRangeFilter(Builder $query, $from = null, $to = null){
        if ($from && !$to) {
            $query->where('created_at', '>=', $from);
        } elseif (!$from && $to){
            $query->where('created_at', '<=', $to);
        } elseif ($from && $to){
            $query->whereBetween('created_at', [$from, $to]);
        }
    }

    public function scopePopularLastMonth(Builder $query): Builder
    {

        return $query->popular(now()->subMonth(), now())
        ->HighestRated(now()->subMonth(), now())
        ->minReviews(2);
    }

    public function scopePopularLast6Month(Builder $query): Builder
    {

        return $query->popular(now()->subMonths(6), now())
        ->HighestRated(now()->subMonths(6), now())
        ->minReviews(5);
    }

    public function scopeHighestRatedPopularLastMonth(Builder $query): Builder
    {

        return $query->HighestRated(now()->subMonth(), now())
        ->popular(now()->subMonth(), now())
        ->minReviews(2);
    }

    public function scopeHighestRatedPopularLast6Month(Builder $query): Builder
    {

        return $query->HighestRated(now()->subMonths(6), now())
        ->popular(now()->subMonths(6), now())
        ->minReviews(5);
    }
}
