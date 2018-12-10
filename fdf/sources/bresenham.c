/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   bresenham.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 14:03:04 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/10 19:55:31 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int     ft_bresenham(t_all *all)
{
    all->bres.ey = abs(all->bres.y2 - all->bres.y1); // erreur
    all->bres.ex = abs(all->bres.x2 - all->bres.x1); // erreur
    all->bres.dy = 2 * all->bres.ey;
    all->bres.dx = 2 * all->bres.ex;
    // all->bres.dx = all->bres.ex;
    // all->bres.dy = all->bres.ey;
    all->bres.i = 0;
    all->bres.xincr = 1;
    all->bres.yincr = 1;

    if (all->bres.x1 > all->bres.x2)
        all->bres.xincr = -1;
    if (all->bres.y1 > all->bres.y2)
        all->bres.yincr = -1;
    if (all->bres.dx > all->bres.dy)                // 1er cas
    {
        while (all->bres.i <= all->bres.dx)
        {
            mlx_pixel_put(all->win.mlx_ptr, all->win.win_ptr, all->bres.x1, all->bres.y1, 0xFFFFFF);
            all->bres.i++;
            all->bres.x1 += all->bres.xincr;
            all->bres.ex -= all->bres.dy;
            if (all->bres.ex < 0)
            {
                all->bres.y1 += all->bres.yincr;
                all->bres.ex += all->bres.dx;
            }
        }
    }
    else                                            // 2nd cas
    {
        while (all->bres.i <= all->bres.dy)
        {
            mlx_pixel_put(all->win.mlx_ptr, all->win.win_ptr, all->bres.x1, all->bres.y1, 0xFFFFFF);
            all->bres.i++;
            all->bres.y1 += all->bres.yincr;
            all->bres.ey -= all->bres.dx;
            if (all->bres.ey < 0)
            {
                all->bres.x1 += all->bres.xincr;
                all->bres.ey += all->bres.dy;
            }
        }
    }
    return (0);
}