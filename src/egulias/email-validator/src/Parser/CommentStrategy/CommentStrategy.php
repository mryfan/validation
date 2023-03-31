<?php

namespace Fy97Validation\Egulias\EmailValidator\Parser\CommentStrategy;

use Fy97Validation\Egulias\EmailValidator\EmailLexer;
use Fy97Validation\Egulias\EmailValidator\Result\Result;
use Fy97Validation\Egulias\EmailValidator\Warning\Warning;

interface CommentStrategy
{
    /**
     * Return "true" to continue, "false" to exit
     */
    public function exitCondition(EmailLexer $lexer, int $openedParenthesis): bool;

    public function endOfLoopValidations(EmailLexer $lexer): Result;

    /**
     * @return Warning[]
     */
    public function getWarnings(): array;
}
