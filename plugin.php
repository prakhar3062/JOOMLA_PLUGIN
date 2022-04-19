<?php
defined('_JEXEC') or die;

use BadMethodCallException;
use Joomla\CMS\Event\AbstractImmutableEvent;
use Joomla\CMS\Table\TableInterface;

/**
 * Event class for an event
 */
class MyCustomEvent extends AbstractImmutableEvent
{
	/**
	 * Constructor.
	 *
	 * @param   string  $name       The event name.
	 * @param   array   $arguments  The event arguments.
	 *
	 * @throws  BadMethodCallException
	 */
	public function __construct($name, array $arguments = array())
	{
		if (!array_key_exists('myProperty', $arguments))
		{
			throw new BadMethodCallException("Argument 'myProperty' is required for event $name");
		}

		parent::__construct($name, $arguments);
	}

	/**
	 * Setter for the myProperty argument
	 *
	 * @param   mixed  $value  The value to set
	 *
	 * @return  mixed
	 *
	 * @throws  BadMethodCallException  if the argument is not of the expected type
	 */
	protected function setMyProperty($value)
	{
		if (!empty($value) && !is_object($value) && !is_array($value))
		{
			throw new BadMethodCallException("Argument 'src' of event {$this->name} must be empty, object or array");
		}

		return $value;
	}
}
?>