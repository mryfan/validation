<?php

namespace Fy97Validation\Egulias\EmailValidator\Parser;

use Fy97Validation\Egulias\EmailValidator\EmailLexer;
use Fy97Validation\Egulias\EmailValidator\Result\InvalidEmail;
use Fy97Validation\Egulias\EmailValidator\Result\Reason\ConsecutiveDot;
use Fy97Validation\Egulias\EmailValidator\Result\Result;
use Fy97Validation\Egulias\EmailValidator\Result\ValidEmail;
use Fy97Validation\Egulias\EmailValidator\Warning\Warning;

abstract class PartParser
{
    /**
     * @var Warning[]
     */
    protected $warnings = [];

    /**
     * @var EmailLexer
     */
    protected $lexer;

    public function __construct(EmailLexer $lexer)
    {
        $this->lexer = $lexer;
    }

    abstract public function parse(): Result;

    /**
     * @return Warning[]
     */
    public function getWarnings()
    {
        return $this->warnings;
    }

    protected function parseFWS(): Result
    {
        $foldingWS = new FoldingWhiteSpace($this->lexer);
        $resultFWS = $foldingWS->parse();
        $this->warnings = array_merge($this->warnings, $foldingWS->getWarnings());
        return $resultFWS;
    }

    protected function checkConsecutiveDots(): Result
    {
        if ($this->lexer->current->isA(EmailLexer::S_DOT) && $this->lexer->isNextToken(EmailLexer::S_DOT)) {
            return new InvalidEmail(new ConsecutiveDot(), $this->lexer->current->value);
        }

        return new ValidEmail();
    }

    protected function escaped(): bool
    {
        $previous = $this->lexer->getPrevious();

        return $previous->isA(EmailLexer::S_BACKSLASH)
            && !$this->lexer->current->isA(EmailLexer::GENERIC);
    }
}
