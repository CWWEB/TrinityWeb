<?php

namespace core\commands;

use yii\base\BaseObject;
use yii\swiftmailer\Message;

use trntv\bus\interfaces\SelfHandlingCommand;

class SendEmailCommand extends BaseObject implements SelfHandlingCommand
{
    /**
     * @var mixed
     */
    public $from;
    /**
     * @var mixed
     */
    public $to;
    /**
     * @var string
     */
    public $subject;
    /**
     * @var string
     */
    public $view;
    /**
     * @var array
     */
    public $params;
    /**
     * @var string
     */
    public $body;
    /**
     * @var bool
     */
    public $html = true;

    /**
     * Command init
     */
    public function init()
    {
        $this->from = $this->from ?: \Yii::$app->settings->get(\Yii::$app->TW::CONF_MAILER_EMAIL_ROBOT);
    }

    /**
     * @param \core\commands\SendEmailCommand $command
     * @return bool
     */
    public function handle($command)
    {
        if (!$command->body) {
            $message = \Yii::$app->mailer->compose($command->view, $command->params);
        } else {
            $message = new Message();
            if ($command->isHtml()) {
                $message->setHtmlBody($command->body);
            } else {
                $message->setTextBody($command->body);
            }
        }
        $message->setFrom($command->from);
        $message->setTo($command->to ?: \Yii::$app->settings->get(\Yii::$app->TW::CONF_MAILER_EMAIL_ROBOT));
        $message->setSubject($command->subject);
        return $message->send();
    }

    /**
     * @return bool
     */
    public function isHtml()
    {
        return (bool)$this->html;
    }
}