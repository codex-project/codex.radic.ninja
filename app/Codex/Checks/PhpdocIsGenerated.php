<?php

namespace App\Codex\Checks;

use BeyondCode\SelfDiagnosis\Checks\Check;

class PhpdocIsGenerated implements Check
{
    protected $errors = [];

    /**
     * The name of the check.
     *
     * @param array $config
     *
     * @return string
     */
    public function name(array $config): string
    {
        return 'Codex PHPDOC is valid and up-to-date';
    }

    /**
     * Perform the actual verification of this check.
     *
     * @param array $config
     *
     * @return bool
     */
    public function check(array $config): bool
    {
        $ignore = data_get($config, 'ignore', []);
        $all    = $this->getAllRevisions();
        $all    = array_filter($all, function ($id) use ($ignore) {
            return ! in_array($id, $ignore, true);
        });
        foreach ($all as $id) {
            /** @var \Codex\Contracts\Revisions\Revision $revision */
            $revision = codex()->get($id);
            $phpdoc   = $revision->phpdoc();
            if ( ! $phpdoc->hasXmlFile()) {
                $this->errors[ $id ] = 'is enabled but could not find the xml file [' . $phpdoc->getXmlPath() . ']';
                continue;
            }
            if ( ! $phpdoc->isGenerated()) {
                $this->errors[ $id ] = 'is not generated. Run the "codex:phpdoc:generate" command to fix this.';
                continue;
            }
            if ($phpdoc->shouldGenerate()) {
                $this->errors[ $id ] = 'is out of date. Run the "codex:phpdoc:generate" command to fix this.';
                continue;
            }
        }
        return count($this->errors) === 0;
    }

    /**
     * The error message to display in case the check does not pass.
     *
     * @param array $config
     *
     * @return string
     */
    public function message(array $config): string
    {
        $message = '';
        foreach ($this->errors as $id => $text) {
            $message .= "Failed check for [{$id}]. Phpdoc {$text} \n";
        }
        return $message;
    }

    protected function getAllRevisions()
    {
        $all      = [];
        $projects = codex()->projects();
        foreach ($projects as $project) {
            $revisions = $project->revisions();
            foreach ($revisions as $revision) {
                if ( ! $revision->isPhpdocEnabled()) {
                    continue;
                }
                $all[] = "{$project}/{$revision}";
            }
        }
        return $all;
    }
}
