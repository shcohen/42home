/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   bresenham.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 14:03:04 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/12 14:00:45 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int     ft_bresenham(t_all *all)
{
    all->bres.x = all->bres.xi;
    all->bres.y = all->bres.yi;
    all->bres.dx = all->bres.xf - all->bres.xi;
    all->bres.dy = all->bres.yf - all->bres.yi;
    all->bres.xinc = (all->bres.dx > 0) ? 1 : -1;
    all->bres.yinc = (all->bres.dy > 0) ? 1 : -1;
    all->bres.dx = abs(all->bres.dx);
    all->bres.dy = abs(all->bres.dy);
    mlx_pixel_put(all->win.mlx_ptr, all->win.win_ptr, (all->bres.x), (all->bres.y), 0xFFFFFF);
    if (all->bres.dx > all->bres.dy)
    {
        all->bres.cumul = all->bres.dx / 2;
        all->bres.i = 1;
        while (all->bres.i <= all->bres.dx)
        {
            all->bres.i++;
            all->bres.x += all->bres.xinc;
            all->bres.cumul += all->bres.dy;
            if (all->bres.cumul >= all->bres.dx)
            {
                all->bres.cumul -= all->bres.dx;
                all->bres.y += all->bres.yinc;
            } 
            mlx_pixel_put(all->win.mlx_ptr, all->win.win_ptr, (all->bres.x), (all->bres.y), 0xFFFFFF);
        }
    }
    else
    {
        all->bres.cumul = all->bres.dy / 2;
        all->bres.i = 1;
        while (all->bres.i <= all->bres.dy)
        {
            all->bres.i++;
            all->bres.y += all->bres.yinc;
            all->bres.cumul += all->bres.dx;
            if (all->bres.cumul >= all->bres.dy)
            {
                all->bres.cumul -= all->bres.dy;
                all->bres.x += all->bres.xinc;
            }
            mlx_pixel_put(all->win.mlx_ptr, all->win.win_ptr, (all->bres.x), (all->bres.y), 0xFFFFFF);
        }
    }
    return (0);
}