
var $states = $(".js-source-states");
var statesOptions = $states.html();
$states.remove();

$(".js-states").append(statesOptions);

$("[data-fill-from]").each(function () {
    var $this = $(this);

    var codeContainer = $this.data("fill-from");
    var $container = $(codeContainer);

    var code = $.trim($container.html());

    $this.text(code);
    $this.addClass("prettyprint linenums");
});

prettyPrint();

$.fn.select2.amd.require(
    ["select2/core", "select2/utils", "select2/compat/matcher"],
    function (Select2, Utils, oldMatcher) {
        var $basicSingle = $(".js-example-basic-single");
        var $basicMultiple = $(".js-example-basic-multiple");
        var $limitMultiple = $(".js-example-basic-multiple-limit");

        var $dataArray = $(".js-example-data-array");
        var $dataArraySelected = $(".js-example-data-array-selected");

        var data = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];

        var $ajax = $(".js-example-data-ajax");

        var $disabledResults = $(".js-example-disabled-results");

        var $tags = $(".js-example-tags");

        var $matcherStart = $('.js-example-matcher-start');

        var $diacritics = $(".js-example-diacritics");
        var $language = $(".js-example-language");

        $basicSingle.select2();
        $basicMultiple.select2();
        $limitMultiple.select2({
            maximumSelectionLength: 2
        });

        $dataArray.select2({
            data: data
        });

        $dataArraySelected.select2({
            data: data
        });

        $ajax.select2({
            ajax: {
                url: "https://api.github.com/search/repositories",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term, // search term
                        page: params.page
                    };
                },
                processResults: function (data, params) {
                    // parse the results into the format expected by Select2
                    // since we are using custom formatting functions we do not need to
                    // alter the remote JSON data, except to indicate that infinite
                    // scrolling can be used
                    params.page = params.page || 1;

                    return {
                        results: data.items,
                        pagination: {
                            more: (params.page * 30) < data.total_count
                        }
                    };
                },
                cache: true
            },
            minimumInputLength: 1,
            templateResult: function (repo) {
                if (repo.loading) return repo.text;

                var markup = '<div class="clearfix">' +
                    '<div class="col-sm-1">' +
                    '<img src="' + repo.owner.avatar_url + '" style="max-width: 100%" />' +
                    '</div>' +
                    '<div clas="col-sm-10">' +
                    '<div class="clearfix">' +
                    '<div class="col-sm-6">' + repo.full_name + '</div>' +
                    '<div class="col-sm-3"><i class="fa fa-code-fork"></i> ' + repo.forks_count + '</div>' +
                    '<div class="col-sm-2"><i class="fa fa-star"></i> ' + repo.stargazers_count + '</div>' +
                    '</div>';

                if (repo.description) {
                    markup += '<div>' + repo.description + '</div>';
                }

                markup += '</div></div>';

                return markup;
            },
            templateSelection: function (repo) {
                return repo.full_name || repo.text;
            }
        });

        $(".js-example-disabled").select2();
        $(".js-example-disabled-multi").select2();

        $disabledResults.select2();

        $(".js-example-programmatic").select2();
        $(".js-example-programmatic-multi").select2();

        $eventSelect.select2();

        $tags.select2({
            tags: ['red', 'blue', 'green']
        });

        $(".js-example-tokenizer").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });

        function matchStart (term, text) {
            if (text.toUpperCase().indexOf(term.toUpperCase()) == 0) {
                return true;
            }

            return false;
        }

        $matcherStart.select2({
            matcher: oldMatcher(matchStart)
        });

        $diacritics.select2();

        $language.select2({
            language: "es"
        });

        $(".js-example-theme-single").select2({
            theme: "classic"
        });

        $(".js-example-theme-multiple").select2({
            theme: "classic"
        });

        $(".js-example-rtl").select2();
    });
