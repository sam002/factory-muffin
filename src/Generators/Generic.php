<?php

namespace League\FactoryMuffin\Generators;

use InvalidArgumentException;

/**
 * Class Generic.
 *
 * @package League\FactoryMuffin\Generator
 * @author  Zizaco <zizaco@gmail.com>
 * @author  Scott Robertson <scottymeuk@gmail.com>
 * @author  Graham Campbell <graham@mineuk.com>
 * @license <https://github.com/thephpleague/factory-muffin/blob/master/LICENSE> MIT
 */
class Generic extends Base
{
    /**
     * Generate, and return the attribute.
     *
     * We attempt to use Faker for any string passed in.
     * If a Faker property does not exist, we'll return the original string.
     *
     * @return mixed
     */
    public function generate()
    {
        // Only try and use Faker when there are no spaces in the string
        if (!is_string($this->getGenerator()) || strpos($this->getGenerator(), ' ') !== false) {
            return $this->getGenerator();
        }

        try {
            return $this->execute();
        } catch (InvalidArgumentException $e) {
            // If it fails to call it, it must not exist
            return $this->getGenerator();
        }
    }

    /**
     * Call faker to generate the attribute.
     *
     * @return mixed
     */
    private function execute()
    {
        if ($prefix = $this->getPrefix()) {
            $faker = $this->faker->$prefix();
        } else {
            $faker = $this->faker;
        }

        $generator = $this->getGeneratorWithoutPrefix();

        return call_user_func_array(array($faker, $generator), $this->getOptions());
    }
}
