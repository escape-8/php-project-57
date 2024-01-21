test:
	composer exec --verbose phpcs -- --standard=phpcs.xml app bootstrap config public storage database tests
