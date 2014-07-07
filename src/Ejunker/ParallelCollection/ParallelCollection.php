<?php namespace Ejunker\ParallelCollection;

use Closure;
use Illuminate\Support\Collection;
use KzykHys\Parallel\Parallel;

class ParallelCollection extends Collection {

	/**
	 * Execute a callback over each item.
	 *
	 * @param  Closure  $callback
	 * @return \Illuminate\Support\Collection
	 */
	public function each(Closure $callback)
	{
		$parallel = new Parallel();
		$parallel->each($this->items, $callback);

		return $this;
	}

	/**
	 * Run a map over each of the items.
	 *
	 * @param  Closure  $callback
	 * @return \Illuminate\Support\Collection
	 */
	public function map(Closure $callback)
	{
		//return new static(array_map($callback, $this->items, array_keys($this->items)));

		$parallel = new Parallel();
		return new static($parallel->map($this->items, $callback));
	}

}
