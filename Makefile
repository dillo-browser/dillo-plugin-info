NAME = info
BIN = $(NAME).filter.dpi
EXTRA = info2html info2html.css info2html.conf
DILLO_DIR = ~/.dillo
DPI_DIR = $(DILLO_DIR)/dpi/$(NAME)
DPIDRC = $(DILLO_DIR)/dpidrc

all:
	@echo "Use 'make install' to install"
	@echo "Use 'make uninstall' to uninstall"

$(DPIDRC):
	cp /etc/dillo/dpidrc $@

install-proto: $(DPIDRC)
	grep -q '^proto.$(NAME)=$(NAME)' $< || echo 'proto.$(NAME)=$(NAME)/$(BIN)' >> $<

link: $(BIN) install-proto
	mkdir -p $(DPI_DIR)
	ln -frs $(BIN) $(DPI_DIR)
	ln -frs $(EXTRA) $(DPI_DIR)

install: $(BIN) install-proto
	mkdir -p $(DPI_DIR)
	cp -f $(BIN) $(DPI_DIR)
	cp -f $(EXTRA) $(DPI_DIR)

uninstall: $(BIN)
	rm -f $(DPI_DIR)/$(BIN)
	cd $(DPI_DIR) && rm -f $(EXTRA)
	rmdir $(DPI_DIR)

.PHONY:
	all link install install-proto uninstall
