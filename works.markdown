---
title: Все работы
date: 2020-09-13 19:47:00 +05:00
permalink: "/works/"
layout: default
---

<div class="videos-intro">
    <iframe src="{{ site.showreel_url }}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
</div>

<div class="videos-title h2 text-center">
    {{ site.works_title }}
</div>

{% for category in site.categories %}
{% assign category_object = category[0] %}

<div class="videos-section">
    <div class="h3 text-center">
        {{ category_object }}
    </div>
    <div class="row">
        {% for post in site.categories[category_object] %}
        <div class="col-lg-6">
            <div class="video-box">
                <div class="video-poster">
                    <a data-fancybox data-ratio="2" href="{{ post.vimeo_link }}">
                        <img src="{{ post.image }}" alt="">
                    </a>
                </div>
                <div class="video-info">
                    <div class="video-title">
                        <a data-fancybox data-ratio="2" href="{{ post.vimeo_link }}">
                            {{ post.title }}
                        </a>
                        <a href="{{ post.url }}">&</a>
                    </div>
                    {% if post.content %}
                    <div class="video-content">
                        {{ post.content }}
                    </div>
                    {% endif %}
                    {% if post.case_link %}
                    <div class="video-about-link">
                        <a href="{{ post.case_link }}">{{ post.case_title|default:"о проекте" }}</a>
                    </div>
                    {% endif %}
                </div>
            </div>
        </div>
        {% endfor %}
    </div>
</div>
{% endfor %}
