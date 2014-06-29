.PHONY : build release clean

build: clean
	@echo building release
	mkdir build/
	git archive --format=tar HEAD > build/website_release.tar

release: build
	@echo installing release
	rm -rf /tmp/uploads
	mv /home2/officjh3/public_html/wp-content/uploads /tmp/uploads
	rm -rf /home2/officjh3/public_html/*
	tar -xf /home2/officjh3/officialesports/build/website_release.tar -C /home2/officjh3/public_html
	rm - rf /home2/officjh3/public_html/wp-content/uploads
	mv /tmp/uploads /home2/officjh3/public_html/wp-content/uploads

clean:
	@echo removing build directory
	-rm -rf build/
