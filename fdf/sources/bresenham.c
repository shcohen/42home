/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   bresenham.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/29 14:03:04 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/21 14:47:09 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

void	ft_bresenham(t_all *all, int z)
{
	all->bres.x = all->bres.xi;
	all->bres.y = all->bres.yi;
	all->bres.dx = all->bres.xf - all->bres.xi;
	all->bres.dy = all->bres.yf - all->bres.yi;
	if (((all->bres.xi < 0 || all->bres.xi > all->win.width)
		&& (all->bres.xf < 0 || all->bres.xf > all->win.width))
		|| ((all->bres.yi < 0 || all->bres.yi > all->win.height)
		&& (all->bres.yf < 0 || all->bres.yf > all->win.height)))
		return ;
	all->bres.xinc = (all->bres.dx > 0) ? 1 : -1;
	all->bres.yinc = (all->bres.dy > 0) ? 1 : -1;
	all->bres.dx = fabs(all->bres.dx);
	all->bres.dy = fabs(all->bres.dy);
	ft_bres1(all, z);
}

void	ft_bres1(t_all *all, int z)
{
	if (all->bres.dx >= all->bres.dy)
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
			ft_fill_pixel(all, ft_colors(all, z));
		}
	}
	else
		ft_bres2(all, z);
}

void	ft_bres2(t_all *all, int z)
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
		ft_fill_pixel(all, ft_colors(all, z));
	}
}
