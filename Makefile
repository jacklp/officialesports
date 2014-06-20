.PHONY : build release clean

build: clean
	@echo building release
	mkdir build/
	git archive --format=tar HEAD > build/website_release.tar

release: build
	@echo installing release
	cd /home2/officjh3/public_html && rm -rf *
	tar -xf /home2/officjh3/officialesports/build/website_release.tar -C /home2/officjh3/public_html

clean:
	@echo removing build directory
	-rm -rf build/
