guard 'phpunit2', tests_path: 'tests', cli: '--colors', command: './vendor/bin/phpunit' do
  watch(%r{^.+Test\.php$})
  watch(%r{src/([^/]*)/(.*).php$}) {|m| "tests/#{m[1]}/Tests/#{m[2]}Test.php" }
end
