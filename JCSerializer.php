<?php
namespace Umbrella\JCLibPack;

use JMS\Serializer\Expression\ExpressionEvaluator;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/**
 * Class JCSerializer
 *
 * @package Umbrella\JCLibPack
 */
class JCSerializer
{
	/**
	 * @param      $data
	 * @param bool $serializeNull
	 * @return string
	 */
	static public function serializeToJSON($data, bool $serializeNull = true) :string{

		return static::serialize($data, 'json', $serializeNull);
	}

	/**
	 * @param        $data
	 * @param string $format
	 * @param bool   $serializeNull
	 * @param array  $groups
	 * @param bool   $useExpressions
	 * @return mixed
	 */
	static public function serialize($data, $format = 'json', bool $serializeNull = true, array $groups = [], bool $useExpressions = true) {

		$groups = count($groups) ? $groups : ['Default'];

		$Serializer = SerializerBuilder::create();
		if ($useExpressions)
			$Serializer->setExpressionEvaluator(new ExpressionEvaluator(new ExpressionLanguage()));

		return $Serializer->build()->serialize(
			$data,
			$format,
			(new SerializationContext())->setSerializeNull($serializeNull)->setGroups($groups)
		);
	}



	/**
	 * @param $content
	 * @param string $type
	 * @param string $format
	 * @return array|\JMS\Serializer\|mixed|object
	 */
	static function deserialize($content, $type = 'array', $format = 'json'){
		$serializer = SerializerBuilder::create()->build();

		return $serializer->deserialize(
			$content,
			$type,
			$format
		);
	}



}