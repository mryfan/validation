<?php

namespace Fy97Validation\Egulias\EmailValidator\Parser\CommentStrategy;

use Fy97Validation\Egulias\EmailValidator\EmailLexer;
use Fy97Validation\Egulias\EmailValidator\Result\Result;
use Fy97Validation\Egulias\EmailValidator\Result\ValidEmail;
use Fy97Validation\Egulias\EmailValidator\Warning\CFWSNearAt;
use Fy97Validation\Egulias\EmailValidator\Result\InvalidEmail;
use Fy97Validation\Egulias\EmailValidator\Result\Reason\ExpectingATEXT;

class LocalComment implements CommentStrategy
{
    /**
     * @var array
     */
    private $warnings = [];

    public function exitCondition(EmailLexer $lexer, int $openedParenthesis): bool
    {
        return !$lexer->isNextToken(EmailLexer::S_AT);
    }

    public function endOfLoopValidations(EmailLexer $lexer): Result
    {
        if (!$lexer->isNextToken(EmailLexer::S_AT)) {
            return new InvalidEmail(new ExpectingATEXT('ATEX is not expected after closing comments'), $lexer->current->value);
        }
        $this->warnings[CFWSNearAt::CODE] = new CFWSNearAt();
        return new ValidEmail();
    }

    public function getWarnings(): array
    {
        return $this->warnings;
    }
}
