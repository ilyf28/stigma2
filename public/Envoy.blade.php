@servers(['nagios' => 'nagios@nagios'])

@task('ls', ['on' => 'nagios'])
    ls -al /
@endtask