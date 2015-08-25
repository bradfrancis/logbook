var Panel = function(panelDiv) {
    this.number = parseInt($(panelDiv).attr('data-panel-number'));
    this.body = $(panelDiv).children('div.panel-body');
    this.toggleButton = $(panelDiv).find('button.panel-toggle-btn');
    this.continueButton = $(panelDiv).find('button.continue-btn');
    this.panel = panelDiv;

    this.status = 'open';

    this.previousPanel = null;
    this.nextPanel = null;

    $(this.toggleButton).click({panel: this}, function(e) {
        e.preventDefault();
        e.data.panel.toggle();
    })

    $(this.continueButton).click({panel: this}, function(e) {
        e.preventDefault();

        e.data.panel.nextPanel.open();
    })
};

Panel.prototype.setNextPanel = function(p) {

    // If a Panel object is passed in, set it
    // as the next panel. Otherwise return null.
    if (p instanceof Panel) {
        this.nextPanel = p;
        return true;
    }

    return null;
};

Panel.prototype.setPreviousPanel = function(p) {

    // If a Panel object is passed in, set it
    // as the next panel. Otherwise return null.
    if (p instanceof Panel) {
        this.previousPanel = p;
        return true;
    }

    return null;
};

Panel.prototype.open = function() {
    // Close other panels
    this.closeOthers();

    $(this.body).show("slow");

    // Set open status
    this.status = 'open';

    // Toggle the button icon
    this.setButtonIcon();
};

Panel.prototype.close = function() {

    // Close the panel body
    $(this.body).hide("slow");

    // Set open status
    this.status = 'closed';

    // Toggle the button icon
    this.setButtonIcon();
};

Panel.prototype.closeOthers = function() {
    var prev = this.previousPanel;
    var next = this.nextPanel;

    while (prev || next) {
        if (prev) {

            if (prev.status === 'open') {
                prev.close();
            }

            prev = prev.previousPanel;
        }

        if (next) {
            if (next.status === 'open') {
                next.close();
            }

            next = next.nextPanel;
        }
    }
};

Panel.prototype.setButtonIcon = function() {
    if (this.status === 'open') {
        this.toggleButton.html('<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>');
    }
    else {
        this.toggleButton.html('<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>')
    }
};

Panel.prototype.toggle = function() {
    if (this.status === 'open') {
        this.close();
    }
    else {
        this.open();
    }
};

// Create an array of panels, sorting them as we go
var panels = [];
$('div.panel').each(function() {

    // Create new Panel object
    p = new Panel(this);

    // Find where to insert new Panel into the array
    var inserted = false;
    for (var i = 0; i < panels.length; i++) {
        if (p.number < panels[i].number) {

            // Insert panel
            panels.splice(i, 0, p);
            inserted = true;

            // Break from the loop to prevent redundantly
            // iterating over the remainder of the loop
            break;
        }
    }

    // If the panel wasn't inserted then add it
    // to the end of the array
    if(!inserted) {
        panels.push(p);
    }
});

// Link panels together
for (var i=0; i < panels.length; i++) {
    if (i === 0) {
        panels[i].previousPanel = null;
    }
    else if (i === panels.length) {

        panels[i].setPreviousPanel(panels[i-1]);
        panels[i].nextPanel = null;
    }
    else {
        panels[i].setPreviousPanel(panels[i-1]);
        panels[i].previousPanel.setNextPanel(panels[i]);
    }
}

function resetPanels()
{
    panels[0].open();
}

