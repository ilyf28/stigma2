@servers(['nagios' => ['nagios']])

@task('ls', ['on' => 'nagios'])
        ls -al /app/nagios
@endtask