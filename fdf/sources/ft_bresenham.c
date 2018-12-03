/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_bresenham.c                                     :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 14:03:04 by shcohen           #+#    #+#             */
/*   Updated: 2018/11/29 15:40:58 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int     ft_bresenham(int x1, int x2, int y1, int y2)
{
    int     dx;
    int     dy;
    int     e;              // valeur d'erreur

    e = x2 - x1;           // -e(0,1)
    dx = e * 2;            // -e(0,1)
    dy = (y2 - y1) * 2;    // e(1,0)
    while (x1 <= x2)
    {
     //   tracerPixel(x1, y1) ;
        x1 = x1 + 1;        // colonne du pixel suivant
        if ((e = e - dy) <= 0)
        {                   // erreur pour le pixel suivant de même rangée
            y1 = y1 + 1;    // choisir plutôt le pixel suivant dans la rangée supérieure
            e = e + dx;     // ajuste l’erreur commise dans cette nouvelle rangée
        }
     }                      // Le pixel final (x2, y2) n’est pas tracé.
    return (0);
}