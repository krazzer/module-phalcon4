<?php

namespace Codeception\Lib\Connector\Phalcon4;

use Phalcon\Session\Manager;

class SessionManager extends Manager
{
    /**
     * We have to override this as otherwise nothing working correctly in testing.
     *
     * @return bool
     */
    public function exists(): bool
    {
        return true;
    }

    /**
     * @return void
     */
    public function destroy(): void
    {
        $this->getAdapter()->destroy($this->getId());
    }

    /**
     * @inheritdoc
     */
    public function get(string $key, $defaultValue = null, bool $remove = false)
    {
        return $this->getAdapter()->get($key, $defaultValue, $remove);
    }

    /**
     * @inheritdoc
     */
    public function set(string $key, $value): void
    {
        $this->getAdapter()->set($key, $value);
    }
}
