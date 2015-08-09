---
layout: post
title: MDS
category: 科研
tags: Algorithm
keywords: 降维,多维尺度分析
description: 
---

###About
Multidimensional scaling (MDS) is a means of visualizing the level of similarity of individual cases of a dataset. It refers to a set of related ordination techniques used in information visualization, in particular to display the information contained in a distance matrix. An MDS algorithm aims to place each object in N-dimensional space such that the between-object distances are preserved as well as possible. Each object is then assigned coordinates in each of the N dimensions. The number of dimensions of an MDS plot N can exceed 2 and is specified a priori. Choosing N=2 optimizes the object locations for a two-dimensional scatterplot.


###MDS & GMDS
####Classical multidimensional scaling
Also known as Principal Coordinates Analysis, Torgerson Scaling or Torgerson–Gower scaling. Takes an input matrix giving dissimilarities between pairs of items and outputs a coordinate matrix whose configuration minimizes a loss function called strain

####Generalized multidimensional scaling
An extension of metric multidimensional scaling, in which the target space is an arbitrary smooth non-Euclidean space. In cases where the dissimilarities are distances on a surface and the target space is another surface, GMDS allows finding the minimum-distortion embedding of one surface into another.

###Procedure

There are several steps in conducting MDS research:

    1.Formulating the problem – What variables do you want to compare? How many variables do you want to compare? More than 20 is often considered cumbersome.[citation needed] Fewer than 8 (4 pairs) will not give valid results.[citation needed] What purpose is the study to be used for?
    2.Obtaining input data – Respondents are asked a series of questions. For each product pair, they are asked to rate similarity (usually on a 7 point Likert scale from very similar to very dissimilar). The first question could be for Coke/Pepsi for example, the next for Coke/Hires rootbeer, the next for Pepsi/Dr Pepper, the next for Dr Pepper/Hires rootbeer, etc. The number of questions is a function of the number of brands and can be calculated as Q = N (N - 1) / 2 where Q is the number of questions and N is the number of brands. This approach is referred to as the “Perception data : direct approach”. There are two other approaches. There is the “Perception data : derived approach” in which products are decomposed into attribu.tes that are rated on a semantic differential scale. The other is the “Preference data approach” in which respondents are asked their preference rather than similarity.
    3.Running the MDS statistical program – Software for running the procedure is available in many software for statistics. Often there is a choice between Metric MDS (which deals with interval or ratio level data), and Nonmetric MDS (which deals with ordinal data).
    4.Decide number of dimensions – The researcher must decide on the number of dimensions they want the computer to create. The more dimensions, the better the statistical fit, but the more difficult it is to interpret the results.
    5.Mapping the results and defining the dimensions – The statistical program (or a related module) will map the results. The map will plot each product (usually in two-dimensional space). The proximity of products to each other indicate either how similar they are or how preferred they are, depending on which approach was used. How the dimensions of the embedding actually correspond to dimensions of system behavior, however, are not necessarily obvious. Here, a subjective judgment about the correspondence can be made (see perceptual mapping).
    6.Test the results for reliability and validity – Compute R-squared to determine what proportion of variance of the scaled data can be accounted for by the MDS procedure. An R-square of 0.6 is considered the minimum acceptable level.[citation needed] An R-square of 0.8 is considered good for metric scaling and .9 is considered good for non-metric scaling. Other possible tests are Kruskal’s Stress, split data tests, data stability tests (i.e., eliminating one brand), and test-retest reliability.
    7.Report the results comprehensively – Along with the mapping, at least distance measure (e.g., Sorenson index, Jaccard index) and reliability (e.g., stress value) should be given. It is also very advisable to give the algorithm (e.g., Kruskal, Mather), which is often defined by the program used (sometimes replacing the algorithm report), if you have given a start configuration or had a random choice, the number of runs, the assessment of dimensionality, the Monte Carlo method results, the number of iterations, the assessment of stability, and the proportional variance of each axis (r-square).
    
###External links
【1】[Wiki](http://en.wikipedia.org/wiki/Multidimensional_scaling)