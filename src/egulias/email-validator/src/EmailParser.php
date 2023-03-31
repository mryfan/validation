<?php

namespace Fy97Validation\Egulias\EmailValidator;

use Fy97Validation\Egulias\EmailValidator\Result\Result;
use Fy97Validation\Egulias\EmailValidator\Parser\LocalPart;
use Fy97Validation\Egulias\EmailValidator\Parser\DomainPart;
use Fy97Validation\Egulias\EmailValidator\Result\ValidEmail;
use Fy97Validation\Egulias\EmailValidator\Result\InvalidEmail;
use Fy97Validation\Egulias\EmailValidator\Warning\EmailTooLong;
use Fy97Validation\Egulias\EmailValidator\Result\Reason\NoLocalPart;

class EmailParser extends Parser
{
    public const EMAIL_MAX_LENGTH = 254;

    /**
     * @var string
     */
    protected $domainPart = '';

    /**
     * @var string
     */
    protected $localPart = '';

    public function parse(string $str): Result
    {
        $result = parent::parse($str);

        $this->addLongEmailWarning($this->localPart, $this->domainPart);

        return $result;
    }

    protected function preLeftParsing(): Result
    {
        if (!$this->hasAtToken()) {
            return new InvalidEmail(new NoLocalPart(), $this->lexer->current->value);
        }
        return new ValidEmail();
    }

    protected function parseLeftFromAt(): Result
    {
        return $this->processLocalPart();
    }

    protected function parseRightFromAt(): Result
    {
        return $this->processDomainPart();
    }

    private function processLocalPart(): Result
    {
        $localPartParser = new LocalPart($this->lexer);
        $localPartResult = $localPartParser->parse();
        $this->localPart = $localPartParser->localPart();
        $this->warnings = array_merge($localPartParser->getWarnings(), $this->warnings);

        return $localPartResult;
    }

    private function processDomainPart(): Result
    {
        $domainPartParser = new DomainPart($this->lexer);
        $domainPartResult = $domainPartParser->parse();
        $this->domainPart = $domainPartParser->domainPart();
        $this->warnings = array_merge($domainPartParser->getWarnings(), $this->warnings);

        return $domainPartResult;
    }

    public function getDomainPart(): string
    {
        return $this->domainPart;
    }

    public function getLocalPart(): string
    {
        return $this->localPart;
    }

    private function addLongEmailWarning(string $localPart, string $parsedDomainPart): void
    {
        if (strlen($localPart . '@' . $parsedDomainPart) > self::EMAIL_MAX_LENGTH) {
            $this->warnings[EmailTooLong::CODE] = new EmailTooLong();
        }
    }
}
