.PHONY : build release clean

build: clean
	@echo building release
	mkdir build/
	git archive --format=tar HEAD > build/website_release.tar

release: build
	@echo installing release
	cd /home2/officjh3/public_html
	mv /home2/officjh3/public_html/wp-content/uploads /tmp/uploads
	rm -rf *
	tar -xf /home2/officjh3/officialesports/build/website_release.tar -C /home2/officjh3/public_html
	rm /home2/officjh3/public_html/wp-uploads
	mv /tmp/uploads /home2/officjh3/public_html/wp-content/uploads

clean:
	@echo removing build directory
	-rm -rf build/
